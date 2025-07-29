<?php

namespace App\Mapper;

use App\DTO\UserDTO;
use App\Entity\User;

class UserMapper {
    public function toDTO(User $user): UserDTO {
        $dto = new UserDTO();
        $dto->id = $user->getId();
        $dto->username = $user->getUsername();
        $dto->email = $user->getEmail();
        $dto->password = $user->getPassword();
        return $dto;
    }

    public function toEntity(UserDTO $userDTO): User
    {
        $user = new User();
        $user->setUsername($userDTO->username);
        $user->setEmail($userDTO->email);
        $user->setPassword($userDTO->password);
        return $user;
    }
}
