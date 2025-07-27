<?php
namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthService {

    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher) {}

    public function register(User $user):void  {
        $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
