<?php

namespace Http\Repository;

use PDO;
use Http\Repository\Interfaces\UserRepositoryInterface;
use Http\Models\User;

class MysqlUserRepository implements UserRepositoryInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function allUsers()
    {
        $statement = $this->pdo->query("SELECT * FROM users");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($data)
    {


        $statement = $this->pdo->prepare("INSERT INTO users (email, name) VALUES (:email, :name)");
        $statement->execute([
            'email' => $data['email'],
            'name' => $data['name'],
        ]);


        return $this->pdo->lastInsertId();
    }
}
