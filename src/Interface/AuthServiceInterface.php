<?php

namespace App\Interface;

use App\Entity\User;

interface AuthServiceInterface {
    public function register(User $user):string;
    public function login(string $username, string $password):string;
}
