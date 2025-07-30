<?php

namespace App\Interface;

use App\DTO\PublicationRequestDTO;
use App\DTO\PublicationResponseDTO;
use App\Entity\Publication;
use Symfony\Component\Uid\Uuid;

interface PublicationServiceInterface
{
    public function createPublication(PublicationRequestDTO $publicationDTO, $user): Publication;
    public function getPublication(Uuid $publicationId): PublicationResponseDTO;
}
