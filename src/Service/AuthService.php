<?php
namespace App\Service;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Interface\AuthServiceInterface;
use App\Mapper\AuthMapper;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class AuthService implements AuthServiceInterface {

    public function __construct(private UserRepository              $userRepository,
                                private UserPasswordHasherInterface $passwordHasher,
                                private JWTTokenManagerInterface    $JWTTokenManager,
                                private AuthMapper                  $userMapper,
    ) {}

    #[\Override]
    public function register(RegisterDTO $registerDTO):string  {
        $user = $this->userMapper->registerDtoToEntity($registerDTO);
        $hashedPassword = $this->passwordHasher->hashPassword($user, $registerDTO->getPassword());
        $user->setPassword($hashedPassword);
        $this->userRepository->save($user);
        return $this->JWTTokenManager->create($user);
    }

    #[\Override]
    public function login(LoginDTO $loginDTO):string {
        $user = $this->userMapper->loginDtoToEntity($loginDTO);

        $foundUser = $this->userRepository->loadUserByIdentifier($user->getEmail());

        if (!$foundUser || !$this->passwordHasher->isPasswordValid($foundUser, $user->getPassword())) {
            throw new BadCredentialsException('Invalid username or password');
        }

        return $this->JWTTokenManager->create($foundUser);
    }
}
