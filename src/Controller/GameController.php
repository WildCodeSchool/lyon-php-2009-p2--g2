<?php

namespace App\Controller;

use App\Model\EventManager;
use App\Model\CharacterManager;
use App\Model\GameManager;
use App\Model\ItemManager;

class GameController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        //id do game
        //echo ($idGame);

        //selecionar o ascenseur do jogo
        //Qual o elevador do personagem - select elevador da tabela game com o id do personagem
        //$newEvent = new EventManager();
        //$allEvents = $newEvent->selectEventByFloor($floor);
        //var_dump($allEvents);

        //Array com informacoes do personagem

        //return $this->twig->render('Event/event.html.twig', ['donutz' => $donutz]);
        //return $this->twig->render('Event/event.html.twig', ['event' => $event, 'personnage' => $personnage]);
        return $this->twig->render('Game/event.html.twig');
    }
}