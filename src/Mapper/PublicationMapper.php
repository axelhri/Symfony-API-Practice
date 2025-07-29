<?php

namespace App\Mapper;

use App\DTO\PublicationDTO;
use App\Entity\Publication;

class PublicationMapper {

    public function publicationToEntity(PublicationDTO $publicationDTO): Publication {
        $publication = new Publication();
        $publication->setText($publicationDTO->getText());
        $publication->setPin($publicationDTO->getPin());
        $publication->setAuthor($publicationDTO->getAuthor());
        return $publication;
    }

    public function publicationToDTO(Publication $publication): PublicationDTO {
        $publicationDTO = new PublicationDTO();
        $publicationDTO->setText($publication->getText());
        $publicationDTO->setPin($publication->isPin());
        $publicationDTO->setAuthor($publication->getAuthor());
        return $publicationDTO;
    }

}
