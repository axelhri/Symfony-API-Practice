<?php
namespace App\Controller;

use App\Entity\User;
use App\Service\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends AbstractController {

    public function __construct(private AuthService $authService) {}

    #[Route('/api/v1/auth/register', name: 'api_auth_register', methods: ['POST'])]
    public function register(Request $request):Response {
        $data = json_decode($request->getContent(), true);
        $user = new User();

        $user->setUsername($data['username']);
        $user->setEmail($data['email'] ?? '');
        $user->setPassword($data['password'] ?? '');

        $this->authService->register($user);
        return new Response('', Response::HTTP_CREATED);
    }
}
