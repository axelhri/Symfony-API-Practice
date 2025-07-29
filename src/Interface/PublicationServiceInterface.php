<?php

namespace App\Interface;

use App\Entity\Publication;

interface PublicationServiceInterface
{
    public function createPublication(Publication $publication): Publication;
}
