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
class ActionManager extends AbstractManager
{
    private const TABLE = 'action';
    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    public function selectAllActions($idEvent): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM ' .  self::TABLE . " WHERE event_id = :event_id");
        $statement->bindValue(':event_id', $idEvent, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}
