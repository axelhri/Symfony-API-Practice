<?php

namespace App\Mapper;

use App\DTO\PublicationRequestDTO;
use App\DTO\PublicationResponseDTO;
use App\Entity\Publication;

class PublicationMapper {

    public function publicationToEntity(PublicationRequestDTO $publicationDTO): Publication {
        $publication = new Publication();
        $publication->setText($publicationDTO->getText());
        $publication->setPin($publicationDTO->getPin());
        $publication->setAuthor($publicationDTO->getAuthor());
        return $publication;
    }

    public function publicationToResponseDTO(Publication $publication): PublicationResponseDTO {
        $publicationDTO = new PublicationResponseDTO();
        $publicationDTO->setText($publication->getText());
        $publicationDTO->setPin($publication->isPin());
        return $publicationDTO;
    }

}
