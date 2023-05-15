<?php


namespace App\Controller;

use App\Dto\Incoming\CreatePlayerDto;
use App\Exception\InvalidRequestDataException;
use App\Serialization\SerializationService;
use App\Service\PlayerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends ApiController
{
    private PlayerService $playerService;
    private SerializationService $serializationService;

    public function __construct(SerializationService $serializationService, PlayerService $playerService)
    {
        parent::__construct($serializationService);
        $this->playerService = $playerService;
    }

    /**
     * @throws InvalidRequestDataException
     * @throws \JsonException
     */
    #[Route('api/players', methods: ('POST'))]
    public function  createPlayer(Request $request): Response
    {
    $dto = $this->getValidatedDto($request, CreatePlayerDto::class);
    return$this->json($this->playerService->createPlayer($dto));
    }
}