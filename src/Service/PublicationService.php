<?php

namespace App\Service;


use App\DTO\PublicationDTO;
use App\Entity\Publication;
use App\Entity\User;
use App\Interface\PublicationServiceInterface;
use App\Mapper\PublicationMapper;
use App\Repository\PublicationRepository;

class PublicationService implements PublicationServiceInterface {

    public function __construct(private PublicationRepository $publicationRepository, private PublicationMapper $publicationMapper) {}

    #[\Override]
    public function createPublication(PublicationDTO $publicationDTO, $user): Publication {
        $publication = $this->publicationMapper->publicationToEntity($publicationDTO);
        $publication->setAuthor($user);
        $this->publicationRepository->save($publication);
        return $publication;
    }
}
