<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

class UserManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'user';

    /**
     * UserManager constructor.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param array $user
     * @return int
     */
    public function newUser(array $user): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (username, email, password) VALUES (:username, :email, :password)");
        $statement->bindValue(':username', $user['username'], \PDO::PARAM_STR);
        $statement->bindValue(':email', $user['email'], \PDO::PARAM_STR);
        $statement->bindValue(':password', $user['password'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    /**
     * @param string $username
     * @return array
     */
    public function passwordCheck(string $username): array
    {
        $query = "SELECT id, password FROM " . self::TABLE . " WHERE `username` = :username;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':username', $username, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }

    public function is_UsedUsername(string $username)
    {
        $query = "SELECT id FROM " . self::TABLE . " WHERE `username` = :username;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':username', $username, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }

    public function is_UsedEmail(string $email)
    {
        $query = "SELECT id FROM " . self::TABLE . " WHERE `email` = :email;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }

}