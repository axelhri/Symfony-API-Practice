<?php

namespace App\Service;


use App\Entity\Publication;
use App\Interface\PublicationServiceInterface;
use App\Repository\PublicationRepository;

class PublicationService implements PublicationServiceInterface {

    public function __construct(private PublicationRepository $publicationRepository){}

    #[\Override]
    public function createPublication(Publication $publication): Publication {
        return $this->publicationRepository->save($publication);
    }

}
