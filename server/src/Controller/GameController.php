<?php

namespace App\Controller;

use App\Dto\Incoming\CreateGameDto;
use App\Exception\InvalidRequestDataException;
use App\Serialization\SerializationService;
use App\Service\GameService;
use JsonException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends ApiController
{
   private GameService $gameService;
    private SerializationService $serializationService;

    public function __construct(SerializationService $serializationService, GameService $gameService)
    {
        parent::__construct($serializationService);
        $this->gameService = $gameService;
    }

    /**
     * @throws JsonException
     * @throws InvalidRequestDataException
     */
    #[Route('api/games', methods: ('POST'))]
    public function createGame(Request $request): Response
    {
        $dto = $this->getValidatedDto($request, CreateGameDto::class);
        return $this->json($this->gameService->createGame($dto));
    }


}