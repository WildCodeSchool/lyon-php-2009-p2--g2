<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

class ItemManager extends AbstractManager
{
    private const TABLE = 'item';
    private const TABLE2 = 'game_has_item';
    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    /**
     * @param array $item
     * @return int
     */
    public function insert(array $item): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $item['title'], \PDO::PARAM_STR);
        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
    /**
     * @param array $item
     * @return bool
     */
    public function update(array $item): bool
    {
        // prepared request
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], \PDO::PARAM_STR);
        return $statement->execute();
    }
    /**
     * Return all character items
     * @param int $idGame
     * @return array
     */
    public function selectAllPlayerItems(int $idGame): array
    {
        // prepared request
        $query = "SELECT * FROM " . self::TABLE . " INNER JOIN " . self::TABLE2 . " ON " . self::TABLE . ".id = ";
        $query .= self::TABLE2 . ".item_id WHERE game_id = :game_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('game_id', $idGame, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function countItems($idGame)
    {
        // prepared request
        //Select count(*) as items from game_has_item where game_id = $player['id']
        $query = "SELECT COUNT(*) as items FROM " . self::TABLE2 . " WHERE game_id = :game_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('game_id', $idGame, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
    public function chooseRandomItem($idGame)
    {
        //SELECT * FROM item
        //WHERE id NOT IN (SELECT item_id FROM game_has_item where game_id = 3)
        // ORDER BY RAND() LIMIT 1;
        $query = "SELECT * FROM " . self::TABLE . " WHERE id NOT IN (SELECT item_id FROM ";
        $query .= self::TABLE2 . "WHERE game_id = :idGame) ORDER BY RAND() LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('game_id', $idGame, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    public function selectItemsByUser($idUser)
    {
        $query = "select i.id, i.name, i.image, i.strength, i.energy, i.humor, i.agility, gi.game_id ";
        $query .= "from " . $this->table . " i inner join " . self::TABLE2 . " gi ";
        $query .= "ON i.id = gi.item_id ";
        $query .= "where game_user_id = :id ";
        $query .= "order by gi.game_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $idUser, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}
