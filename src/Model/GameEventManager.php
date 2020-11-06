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
    const TABLE = 'game_has_event';
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
}
