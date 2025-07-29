<?php

namespace App\Mapper;

use App\DTO\PublicationDTO;
use App\Entity\Publication;

class PublicationMapper {

    public function publicationToEntity(PublicationDTO $publicationDTO): Publication
    {
        $publication = new Publication();
        $publication->setText($publicationDTO->getText());
        $publication->setPin($publicationDTO->getPin());
        $publication->setAuthor($publicationDTO->getAuthor());
        return $publication;
    }

}
