<?php

namespace App\Service;


use App\DTO\PublicationRequestDTO;
use App\DTO\PublicationResponseDTO;
use App\Entity\Publication;
use App\Entity\User;
use App\Interface\PublicationServiceInterface;
use App\Mapper\PublicationMapper;
use App\Repository\PublicationRepository;
use Symfony\Component\Uid\Uuid;

class PublicationService implements PublicationServiceInterface {

    public function __construct(private PublicationRepository $publicationRepository, private PublicationMapper $publicationMapper) {}

    #[\Override]
    public function createPublication(PublicationRequestDTO $publicationDTO, $user): Publication {
        $publication = $this->publicationMapper->publicationToEntity($publicationDTO);
        $publication->setAuthor($user);
        $this->publicationRepository->save($publication);
        return $publication;
    }

    #[\Override]
    public function getPublication(Uuid $publicationId): PublicationResponseDTO {
        $publication = $this->publicationRepository->find($publicationId);
        return $this->publicationMapper->publicationToResponseDTO($publication);
    }
}
