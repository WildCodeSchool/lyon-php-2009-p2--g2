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
use App\Model\ActionManager;

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


    /**
     *  Display character creation form
     */
    public function createCharacter()
    {
        return $this->twig->render('Character/character.html.twig' );
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = trim($_POST['name']);
            } else {
                $errors['type'] = "Sorry mate, you need to enter a name for your character !";
            }
            if (!in_array($_FILES['image']['type'], $mimeAllowed)) {
                $errors['type'] = "Sorry mate, your file has a wrong extension -> only jpeg and png !";
            }
            if ($_FILES['image']['size'] > 1000000) {
                $errors['size'] = "Sorry mate, your file is too big";
            }
            if (!empty($errors)) {
                return $this->twig->render('Character/character.html.twig', ['errors' => $errors]);
            } else {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $uploadDir = 'upload/';
                $uploadFile = $uploadDir . basename($filename);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                $gameManager = new GameManager();
                $character = [
                    'name' => $name,
                    'image' => $filename,
                    'strength' => $_POST['strength'],
                    'energy' => $_POST['energy'],
                    'humor' => $_POST['humor'],
                    'agility' => $_POST['agility'],
                ];
                $id = $gameManager->newGame($character);
                header("Location:/game/floorDescription/$id");
            }
        }
        $errors['emptyFile'] = "You need to upload an avatar in order to play";
        return $this->twig->render('Character/character.html.twig', ['errors' => $errors]);
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
        $events = [];
        $game = new GameManager();
        $newPlayer = $game->selectOneById($idGame);
        if (!empty($newPlayer['max_floor'])) {
            //Take the game floor to know wich events put in array events.
            $floor = $newPlayer['max_floor'];
            $newEvent = new EventManager();
            //Take all events by floor
            $events = $newEvent->selectAllEvents($floor);
            //Take the events made by floor in game_has_event
            $newGameEvent = new GameEventManager();

            $playerEvents = $newGameEvent->selectAllGameEvents($idGame);
            $arrayPlayerEvents = [];
            $arrayEvents = [];
            $chooseEvent = [];
            if (count($playerEvents) === 0) {
                $chooseEvent = $events[array_rand($events)];
            } elseif (count($playerEvents) >= 1) {
                foreach ($playerEvents as $playerEvent) {
                    $arrayPlayerEvents[] = $playerEvent['event_id'];
                }
                foreach ($events as $event) {
                    $arrayEvents[] = $event['id'];
                }
                $result = array_diff($arrayEvents, $arrayPlayerEvents);
                $chooseEvent = $events[array_rand($result)];
            }
            $newAction = new ActionManager();
            $actions =  $newAction->selectAllActions($chooseEvent['id']);
            $newItems = new ItemManager();
            $itemsPlayer = $newItems->selectAllPlayerItems($idGame);
            return $this->twig->render('Game/event.html.twig', [
                'event' => $chooseEvent,
                'game' => $newPlayer,
                'items' => $itemsPlayer,
                'actions' => $actions, ]
            );
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
        $game->save($idGame);
        $newPlayer = $game->selectOneById($idGame);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['strength'] > 2 || $_POST['energy'] > 2 || $_POST['humor'] > 2 || $_POST['agility'] > 2) {
                $errors['stats'] = "Apparently you're trying to set more points than awarded...";
            }
            if (!empty( $errors )) {
                return $this->twig->render('Elevator/elevator.html.twig', ['errors' => $errors]);
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
                $id = $gameManager->levelUp($update);
                header ( "Location:/game/floorDescription/$id" );
            }
        }
        return $this->twig->render('Elevator/elevator.html.twig');
    }
    
    public function menu()
    {
        $gameManager = new gameManager();
        $id = 1;
        $isEnded = $gameManager->isEnded($id);

        return $this->twig->render('Game/menu.html.twig', ['is_ended' => $isEnded]);
    }

    public function result()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            $action = $_POST;
            //'action_id' => string '4' (length=1)
            //'event_id' => string '1' (length=1)
            // 'game_id' => string '2' (length=1)
            //Take all player information
            $newPlayer = new GameManager();
            $player = $newPlayer->selectOneById($action['game_id']);
            //Take all event information
            $newEvent = new EventManager();
            $event = $newEvent->selectOneById($action['event_id']);
            $newAction = new ActionManager();
            $actionDb = $newAction->selectOneById($action['action_id']);
            $power = $actionDb['stat'];
            echo $power;
            //Compares the power of the event with the power of the player
            if ($player[$power] >= $event[$power]) {
                //If he won:
                //check how many events he did in this floor
                $arrayCountEvents  = $newPlayer->countPlayerEvents($player['id']);
                $countEvents = (int)$arrayCountEvents['event_count'];
                //if the player has 1 or 2 events
                if ($countEvents == 0 || $countEvents == 1) {
                    $countEvents += 1;
                    //records the new event in the database
                    $newGameEvent = new GameEventManager();
                    $newGameEvent->insertGameEvent($player['id'], $player['user_id'], $event['id']);
                    //Update the event_count
                    $newPlayer->updatePlayerEvent($countEvents, $player['id']);
                    //Actualise player
                    $player = $newPlayer->selectOneById($player['id']);
                    //check if the player will win a new item or not;
                    $playerItem = $this->newItemPlayer($player['id']);
                    //Redirect the player to the victory page
                    return $this->twig->render('Game/victory.html.twig', [
                        'game' => $player,
                        'item' => $playerItem,
                        'action' => $actionDb,
                        ]);
                } else {
                    //If he has 2 events:
                    //Registrar o evento no ascencer en questao
                    $newGameEvent = new GameEventManager();
                    $newGameEvent->insertGameEvent($player['id'], $player['user_id'], $event['id']);
                    if ($player['max_floor'] == 1 || $player['max_floor'] == 2 || $player['max_floor'] == 3) {
                        //If he isn't in the last floor
                        $countEvents = 3;
                        //Update the event_count
                        $newPlayer->updatePlayerEvent($countEvents, $player['id']);
                        //Actualise player
                        $player = $newPlayer->selectOneById($player['id']);
                        // Redirect to the elevator change page for the new elevator
                        $id = $player['id'];
                        header("Location:/game/elevator/$id");
                    } else {
                        //Update the event_count
                        $countEvents = 3;
                        $newPlayer->updatePlayerEvent($countEvents, $player['id']);
                        $newDied = new GameManager();
                        $newDied->killPlayer($player['id']);
                        //Actualise player
                        $player = $newPlayer->selectOneById($player['id']);
                        //If he is on the top floor, send he to the final victory page
                        return $this->twig->render('Game/floor.html.twig', [
                            'game' => $player,
                            'action' => $actionDb,
                            ]);
                    }
                }
            } else {
                //If he lost
                //Insert into game (id_ended) values (true) where id = $idGame;
                $newDied = new GameManager();
                $newDied->killPlayer($player['id']);
                //Redirects to the defeat page:
                return $this->twig->render('Game/defeat.html.twig', [
                    'game' => $player,
                    'action' => $actionDb,
                ]);
            }
        } else {
            header('Location:/game/event/');
        }
    }

    public function newItemPlayer($idGame)
    {
        $playerItem = [];
        //Checks how many items the player has
        $newSumItems = new ItemManager();
        $countItems = $newSumItems->countItems($idGame);
        //If he has less than 6 items, he has a change over 3 to win a new item
        if ($countItems < 6) {
            $draw = rand(0, 2);
            if ($draw == 0) {
                //Take an item that the player does not yet have at random.
                $newItem = new ItemManager();
                $playerItem = $newItem->chooseRandomItem($idGame);
                return $playerItem;
            }
        }
        return $playerItem;
    }
    public function floorDescription($id)
    {
        $game = new GameManager();
        $player = $game->selectOneById($id);
        return $this->twig->render('Game/descriptionFloor.html.twig', ['game' => $player] );
    }

    public function firstFloorEvent()
    {
        $id = $_POST['id'];
        header("Location:/game/event/$id");
    }
}
