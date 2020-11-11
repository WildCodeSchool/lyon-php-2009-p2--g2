<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\EventManager;
use App\Model\GameEventManager;
use App\Model\GameManager;
use App\Model\ItemManager;

/**
 * Class GameController
 *
 */
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

    /**
     *  Display character creation form
     */
    public function createCharacter()
    {
        return $this->twig->render ( 'Character/character.html.twig' );
    }

    /**
     * Call newGame method of GameManager if no errors in form.
     * @return string
     */
    public function start()
    {
        $errors = [];
        $mimeAllowed = [
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
        ];
        if (isset( $_FILES ) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset( $_POST['name'] ) && !empty( $_POST['name'] )) {
                $name = trim ( $_POST['name'] );
            } else {
                $errors['type'] = "Sorry mate, you need to enter a name for your character !";
            }
            if (!in_array ( $_FILES['image']['type'], $mimeAllowed )) {
                $errors['type'] = "Sorry mate, your file has a wrong extension -> only jpeg and png !";
            }
            if ($_FILES['image']['size'] > 1000000) {
                $errors['size'] = "Sorry mate, your file is too big";
            }
            if (!empty( $errors )) {
                return $this->twig->render ( 'Character/character.html.twig', ['errors' => $errors] );
            } else {
                $extension = pathinfo ( $_FILES['image']['name'], PATHINFO_EXTENSION );
                $filename = uniqid () . '.' . $extension;
                $uploadDir = 'assets/images/characters/';
                $uploadFile = $uploadDir . basename ( $filename );
                move_uploaded_file ( $_FILES['image']['tmp_name'], $uploadFile );
                $gameManager = new GameManager();
                $character = [
                    'name' => $name,
                    'image' => $filename,
                    'strength' => $_POST['strength'],
                    'energy' => $_POST['energy'],
                    'humor' => $_POST['humor'],
                    'agility' => $_POST['agility'],
                ];
                $id = $gameManager->newGame ( $character );
                header ( "Location:/game/elevator/$id" );
            }
        }
        $errors['emptyFile'] = "You need to upload an avatar in order to play";
        return $this->twig->render ( 'Character/character.html.twig', ['errors' => $errors] );
    }

    /**
     * @param $idGame
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function event($idGame)
    {
        $game = new GameManager();
        $newPlayer = $game->selectOneById ( $idGame );
        if (!empty( $newPlayer['max_floor'] )) {
            //Take the game floor to know wich events put in array events.
            $floor = $newPlayer['max_floor'];
            $newEvent = new EventManager();
            //Take all events by floor
            $this->events = $newEvent->selectAllEvents ( $floor );
            //Take the events made by floor in game_has_event
            $newGameEvent = new GameEventManager();

            $playerEvents = $newGameEvent->selectAllGameEvents ( $idGame );
            $arrayPlayerEvents = [];
            $arrayEvents = [];
            $chooseEvent = [];
            if (count ( $playerEvents ) === 0) {
                $chooseEvent = $this->events[array_rand ( $this->events )];
            } elseif (count ( $playerEvents ) >= 1) {
                foreach ($playerEvents as $playerEvent) {
                    $arrayPlayerEvents[] = $playerEvent['event_id'];
                }
                foreach ($this->events as $event) {
                    $arrayEvents[] = $event['id'];
                }
                $result = array_diff ( $arrayEvents, $arrayPlayerEvents );
                $chooseEvent = $this->events[array_rand ( $result )];
            }
            $newItems = new ItemManager();
            $itemsPlayer = $newItems->selectAllPlayerItems ( $idGame );
            return $this->twig->render ( 'Game/event.html.twig', [
                'event' => $chooseEvent,
                'player' => $newPlayer,
                'items' => $itemsPlayer] );
        } else {
            echo 'Character doesnt exist!';
        }
    }

    /**
     * @param $idGame
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function elevator($idGame)
    {
        $game = new GameManager();
        $game->save ($idGame);
        $newPlayer = $game->selectOneById ( $idGame );
        return $this->twig->render('Elevator/elevator.html.twig', ['player' => $newPlayer]);
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function nextFloor()
    {
        $errors = [];
        if (isset( $_POST ) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['strength'] > 2 || $_POST['energy'] > 2 || $_POST['humor'] > 2 || $_POST['agility'] > 2) {
                $errors['stats'] = "Apparently you're trying to set more points than awarded...";
            }
            if (!empty( $errors )) {
                return $this->twig->render ( 'Elevator/elevator.html.twig', ['errors' => $errors] );
            } else {
                $gameManager = new GameManager();
                $update = [
                    'id' => $_POST['id'],
                    'max_floor' => $_POST['max_floor'],
                    'strength' => $_POST['strength'],
                    'energy' => $_POST['energy'],
                    'humor' => $_POST['humor'],
                    'agility' => $_POST['agility'],
                ];
                $id = $gameManager->levelUp ( $update );
                header ( "refresh:1.5;url=/game/event/$id" );
            }
        }
        return $this->twig->render ( 'Elevator/elevator.html.twig');
    }
    
    public function menu()
    {
        $gameManager = new gameManager();
        $id = 1;
        $isEnded = $gameManager->isEnded($id);

        return $this->twig->render('Game/menu.html.twig', ['is_ended' => $isEnded]);
    }
}
