<?php

namespace App\Interface;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;

interface AuthServiceInterface {
    public function register(RegisterDTO $registerDTO):string;
    public function login(LoginDTO $loginDTO):string;
}
