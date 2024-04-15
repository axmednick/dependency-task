<?php

namespace Http\Repository;

use Http\Repository\Interfaces\UserRepositoryInterface;

class CsvUserRepository implements UserRepositoryInterface
{
    private $csvFilePath='data/data.csv';

    public function allUsers()
    {
        $users = [];

        if (($handle = fopen($this->csvFilePath, "r")) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                $users[] = [
                    'email' => $data[0],
                    'name' => $data[1],
                ];
            }
            fclose($handle);
        }

        return $users;
    }

    public function createUser($data)
    {
        if (($handle = fopen($this->csvFilePath, "a")) !== false) {
            fputcsv($handle, [$data['email'], $data['name']]);
            fclose($handle);
        }

        return time();
    }
}
