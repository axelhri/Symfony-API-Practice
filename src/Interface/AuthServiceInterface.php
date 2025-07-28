<?php

namespace App\Interface;

use App\DTO\UserDTO;
use App\Entity\User;

interface AuthServiceInterface {
    public function register(UserDTO $userDTO):string;
    public function login(string $email, string $password):string;
}
