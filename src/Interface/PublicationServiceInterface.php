<?php

namespace App\Interface;

use App\Entity\Publication;
use App\Entity\User;

interface PublicationServiceInterface
{
    public function createPublication(Publication $publication, $user): Publication;
}
