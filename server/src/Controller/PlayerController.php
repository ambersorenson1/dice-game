<?php
//
//
//namespace App\Controller;
//
//use App\Serialization\SerializationService;
//use http\Env\Request;
//use Symfony\Component\HttpFoundation\Response;
//
//class PlayerController extends ApiController
//{
//    private PlayerService $playerService;
//    private SerializationService $serializationService;
//
//    public function __construct(SerializationService $serializationService, PlayerService $playerService)
//    {
//        parent::__construct($serializationService);
//        $this->playerService = $playerService;
//    }
//
//    #[Route('api/players', methods: ('POST'))]
//    public function  createPlayer(Request $request): Response
//    {
//
//    }
//}