<?php

namespace App\Service;


use App\Entity\Publication;
use App\Entity\User;
use App\Interface\PublicationServiceInterface;
use App\Repository\PublicationRepository;

class PublicationService implements PublicationServiceInterface {

    public function __construct(private PublicationRepository $publicationRepository){}

    #[\Override]
    public function createPublication(Publication $publication, $user): Publication {
        $publication->setAuthor($user);
        $this->publicationRepository->save($publication);
        return $publication;
    }

}
