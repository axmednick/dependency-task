<?php
namespace Http\Repository;
class UserRepositoryFactory
{
    public static function create($source)
    {
        switch ($source) {
            case 'mysql':
                $host = 'localhost';
                $dbname = 'task';
                $username = 'root';
                $password = '';

                $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                return new MysqlUserRepository($pdo);
            case 'csv':
                return new CsvUserRepository();
            default:
                throw new \InvalidArgumentException("Invalid user source: $source");
        }
    }
}