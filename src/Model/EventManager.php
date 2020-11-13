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
class EventManager extends AbstractManager
{
    private const TABLE = 'event';
    private const TABLE2 = 'game_has_event';
    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    public function selectAllEvents($floor): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' .  self::TABLE . " WHERE floor_restriction = :floor");
        $statement->bindValue(':floor', $floor, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}
