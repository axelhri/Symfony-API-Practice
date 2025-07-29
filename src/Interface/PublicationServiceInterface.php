<?php

namespace App\Interface;

use App\DTO\PublicationDTO;
use App\Entity\Publication;
use App\Entity\User;

interface PublicationServiceInterface
{
    public function createPublication(PublicationDTO $publicationDTO, $user): Publication;
}
