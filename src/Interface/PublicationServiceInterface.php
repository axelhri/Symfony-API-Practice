<?php

namespace App\Interface;

use App\DTO\PublicationDTO;
use App\Entity\Publication;
use Symfony\Component\Uid\Uuid;

interface PublicationServiceInterface
{
    public function createPublication(PublicationDTO $publicationDTO, $user): Publication;
    public function getPublication(Uuid $publicationId): PublicationDTO;
}
