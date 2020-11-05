<?php

namespace App\Controller;

use App\Model\EventManager;
use App\Model\GameEventManager;
use App\Model\GameManager;
use App\Model\ItemManager;
use App\Model\AbstractManager;

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
    private $events = [];

    public function index()
    {
        return $this->twig->render('Game/event.html.twig');
    }
    public function event($idGame)
    {
        $game = new GameManager();
        $newPlayer = $game->selectOneById($idGame);
        if (!empty($newPlayer['max_floor'])) {
            //Take the game floor to know wich events put in array events.
            $floor = $newPlayer['max_floor'];
            $newEvent = new EventManager();
            //Take all events by floor
            $this->events = $newEvent->selectAllEvents($floor);
            //Take the events made by floor in game_has_event
            $newGameEvent = new GameEventManager();

            $playerEvents = $newGameEvent->selectAllGameEvents($idGame);
            $arrayPlayerEvents = [];
            $arrayEvents = [];
            $chooseEvent = [];
            if (count($playerEvents) === 0) {
                $chooseEvent = $this->events[array_rand($this->events)];
            } elseif (count($playerEvents) >= 1) {
                foreach ($playerEvents as $playerEvent) {
                    $arrayPlayerEvents[] = $playerEvent['event_id'];
                }
                foreach ($this->events as $event) {
                    $arrayEvents[] = $event['id'];
                }
                $result = array_diff($arrayEvents, $arrayPlayerEvents);
                $chooseEvent = $this->events[array_rand($result)];
            }
            $newItems = new ItemManager();
            $itemsPlayer = $newItems->selectAllPlayerItems($idGame);
            return $this->twig->render('Game/event.html.twig', [
                'event' => $chooseEvent,
                'player' => $newPlayer,
                'items' => $itemsPlayer]);
        } else {
            echo 'Character doesnt exist!';
        }
    }
}
