<?php
namespace App\Service;

use App\DTO\UserDTO;
use App\Entity\User;
use App\Interface\AuthServiceInterface;
use App\Mapper\UserMapper;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class AuthService implements AuthServiceInterface {

    public function __construct(private UserRepository $userRepository,
                                private UserPasswordHasherInterface $passwordHasher,
                                private JWTTokenManagerInterface $JWTTokenManager,
                                private UserMapper $userMapper,
    ) {}

    #[\Override]
    public function register(UserDTO $userDTO):string  {
        $user = $this->userMapper->toEntity($userDTO);
        $hashedPassword = $this->passwordHasher->hashPassword($user, $userDTO->getPassword());
        $user->setPassword($hashedPassword);
        $this->userRepository->save($user);
        return $this->JWTTokenManager->create($user);
    }

    #[\Override]
    public function login(string $email, string $password):string {
        $user = $this->userRepository->loadUserByIdentifier($email);

        if (!$user || !$this->passwordHasher->isPasswordValid($user, $password)) {
            throw new BadCredentialsException('Invalid username or password');
        }

        return $this->JWTTokenManager->create($user);
    }
}
