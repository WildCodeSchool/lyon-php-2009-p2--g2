<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

/**
 *
 */
class GameEventManager extends AbstractManager
{
    private const TABLE = 'game_has_event';
    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    public function selectAllGameEvents($idGame): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' .  self::TABLE . " WHERE game_id = :idGame");
        $statement->bindValue(':idGame', $idGame, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function insertGameEvent($idGame, $idUser, $idEvent)
    {
        // prepared request
        $query = "INSERT INTO " . self::TABLE;
        $query .= " (game_id, game_user_id, event_id) VALUES (:game_id, :game_user_id, :event_id )";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('game_id', $idGame, \PDO::PARAM_INT);
        $statement->bindValue('game_user_id', $idUser, \PDO::PARAM_INT);
        $statement->bindValue('event_id', $idEvent, \PDO::PARAM_INT);
        $statement->execute();
    }
}
