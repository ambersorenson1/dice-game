<?php


namespace App\Controller;

use App\Dto\Incoming\CreatePlayerDto;
use App\Dto\Incoming\EditPlayerDto;
use App\Exception\InvalidRequestDataException;
use App\Serialization\SerializationService;
use App\Service\PlayerService;
use JsonException;
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
     * @throws JsonException
     */
    #[Route('api/players', methods: ('POST'))]
    public function  createPlayer(Request $request): Response
    {
    $dto = $this->getValidatedDto($request, CreatePlayerDto::class);
    return$this->json($this->playerService->createPlayer($dto));
    }

    /**
     * @return Response
     */
    #[Route('api/players', methods: ('GET'))]
    public function getPlayers(): Response
    {
        return $this->json($this->playerService->getPlayers());
    }

    #[Route('api/players/{id}', methods: ('GET'))]
    public function getOnePlayer($id): Response
    {
        return $this->json($this->playerService->getOnePlayer($id));

    }


    /**
     * @throws InvalidRequestDataException
     * @throws JsonException
     */
    #[Route('api/players/{id}', methods: ('PUT'))]
    public function editPlayer(Request $request, $id): Response
    {
        $dto = $this->getValidatedDto($request, EditPlayerDto::class);
        $dto->setId($id);
        return $this->json($this->playerService->editPlayer($dto));
    }

    /**
     * @param int $playerId
     * @return Response
     */
    #[Route('api/players/{id}', methods: ('DELETE'))]
    public function deletePlayer(int $id): Response
    {
        return $this->json($this->playerService->deletePlayer($id));
    }

}