<?php
namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class AuthService {

    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher, private JWTTokenManagerInterface $JWTTokenManager) {}

    public function register(User $user):string  {
        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $this->JWTTokenManager->create($user);
    }
}
