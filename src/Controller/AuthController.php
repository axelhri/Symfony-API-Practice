<?php
namespace App\Controller;

use App\Entity\User;
use App\Middlewares\SerializerService;
use App\Service\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends AbstractController {

    public function __construct(private AuthService $authService, private SerializerService $serializerService) {}

    #[Route('/api/v1/auth/register', name: 'api_auth_register', methods: ['POST'])]
    public function register(Request $request):Response {
        $user = $this->serializerService->deserialize(User::class, $request->getContent());
        $token = $this->authService->register($user);
        return new JsonResponse(['token' => $token], Response::HTTP_CREATED);
    }
}
