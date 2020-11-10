<?php

namespace App\Model;

class GameManager extends AbstractManager
{
    const TABLE = 'game';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function isEnded($id)
    {
        $sql = 'SELECT is_ended FROM game WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->fetch();
        // $statement = $this->pdo->query($sql);
    }
}
