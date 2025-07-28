<?php
namespace App\Controller;

use App\DTO\LoginDTO;
use App\Entity\User;
use App\Interface\AuthServiceInterface;
use App\Middlewares\CookieService;
use App\Middlewares\SerializerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends AbstractController {

    public function __construct(private AuthServiceInterface $authServiceInterface,
                                private SerializerService $serializerService,
                                private CookieService $cookieService) {}

    #[Route('/api/v1/auth/register', name: 'api_auth_register', methods: ['POST'])]
    public function register(Request $request):Response {
        $user = $this->serializerService->deserialize(User::class, $request->getContent());
        $token = $this->authServiceInterface->register($user);
        $cookie = $this->cookieService->generateCookie($token);
        $response = new JsonResponse(['message' => 'Utilisateur crée avec succès'], Response::HTTP_CREATED);
        $response->headers->setCookie($cookie);
        return $response;
    }

    #[Route('/api/v1/auth/login', name: 'auth_login', methods: ['POST'])]
    public function login(Request $request):Response {
        $user = $this->serializerService->deserialize(LoginDTO::class, $request->getContent());
        $token = $this->authServiceInterface->login($user->getEmail(), $user->getPassword());
        $cookie = $this->cookieService->generateCookie($token);
        $response = new JsonResponse(['message' => 'Utilisateur connecté'], Response::HTTP_CREATED);
        $response->headers->setCookie($cookie);
        return $response;
    }
}
