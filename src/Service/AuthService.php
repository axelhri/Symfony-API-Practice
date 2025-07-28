<?php
namespace App\Service;

use App\Entity\User;
use App\Interface\AuthServiceInterface;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class AuthService implements AuthServiceInterface {

    public function __construct(private UserRepository $userRepository,
                                private UserPasswordHasherInterface $passwordHasher,
                                private JWTTokenManagerInterface $JWTTokenManager,
    ) {}

    #[\Override]
    public function register(User $user):string  {
        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));
        $this->userRepository->save($user);
        return $this->JWTTokenManager->create($user);
    }
}
