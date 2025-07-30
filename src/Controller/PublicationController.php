<?php

namespace App\Controller;


use App\DTO\PublicationRequestDTO;
use App\Entity\Publication;
use App\Interface\PublicationServiceInterface;
use App\Middlewares\SerializerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

class PublicationController extends AbstractController {

public function __construct(private SerializerService $serializerService, private PublicationServiceInterface $publicationServiceInterface, private Security $security) {}

    #[Route('/api/v1/publication', name: 'publication', methods: ['POST'])]
    public function createPublication(Request $request): Response {
    $publication = $this->serializerService->deserialize(PublicationRequestDTO::class, $request->getContent());
    $user = $this->security->getUser();
    $this->publicationServiceInterface->createPublication($publication, $user);
    return new JsonResponse(["message" => "Publication created!" , Response::HTTP_CREATED]);
    }

    #[Route('/api/v1/publication/{id}', name: 'get_publication', methods: ['GET'])]
    public function getPublication(string $id): Response {
        $uuid = Uuid::fromString($id);
        $publication = $this->publicationServiceInterface->getPublication($uuid);
        $json = $this->serializerService->serialize($publication);
        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }
}
