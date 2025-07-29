<?php

namespace App\Controller;


use App\Entity\Publication;
use App\Interface\PublicationServiceInterface;
use App\Middlewares\SerializerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicationController extends AbstractController {

public function __construct(private SerializerService $serializerService, private PublicationServiceInterface $publicationServiceInterface, private Security $security) {}

    #[Route('/api/v1/publication', name: 'publication', methods: ['POST'])]
    public function createPublication(Request $request): Response {
    $publication = $this->serializerService->deserialize(Publication::class, $request->getContent());
    $user = $this->security->getUser();
    $this->publicationServiceInterface->createPublication($publication, $user);
    return new JsonResponse(["message" => "Publication created!" , Response::HTTP_CREATED]);
    }
}
