<?php

namespace App\Mapper;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Entity\User;

class AuthMapper {

    public function registerDtoToEntity(RegisterDTO $registerDTO): User
    {
        $user = new User();
        $user->setUsername($registerDTO->getUsername());
        $user->setEmail($registerDTO->getEmail());
        $user->setPassword($registerDTO->getPassword());
        return $user;
    }

    public function loginDtoToEntity(LoginDTO $loginDTO): User
    {
        $user = new User();
        $user->setEmail($loginDTO->getEmail());
        $user->setPassword($loginDTO->getPassword());
        return $user;
    }
}
