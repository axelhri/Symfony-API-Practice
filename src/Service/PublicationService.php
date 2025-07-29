<?php

namespace App\Service;


use App\Entity\Publication;
use App\Interface\PublicationServiceInterface;

class PublicationService implements PublicationServiceInterface {

    #[\Override]
    public function createPublication(Publication $publication): Publication {
        return new Publication();
    }

}
