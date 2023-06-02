<?php

namespace App\Controller;

use App\Dto\Incoming\CreateGameDto;
use App\Dto\Incoming\EditGameDto;
use App\Exception\InvalidRequestDataException;
use App\Serialization\SerializationService;
use App\Service\GameService;
use App\Service\RollService;
use JsonException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends ApiController
{
   private GameService $gameService;
    private SerializationService $serializationService;
    private RollService $rollService;

    public function __construct(SerializationService $serializationService, GameService $gameService, RollService $rollService)
    {
        parent::__construct($serializationService);
        $this->gameService = $gameService;
        $this->rollService = $rollService;
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

    #[Route('api/games/{id}', methods: ('GET'))]
    public function getAllGames(): Response
    {
        return $this->json($this->gameService->getAllGames());
    }


    #[Route('api/games/{id}', methods: ('PUT'))]
    public function editGame(Request $request, $id): Response
    {
        $dto = $this->getValidatedDto($request, EditGameDto::class);
        $dto->setGameId($id);
        return $this->json($this->gameService->editGame($dto));
    }

}