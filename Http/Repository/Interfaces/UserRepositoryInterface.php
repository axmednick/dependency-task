<?php

namespace Http\Repository\Interfaces;

interface UserRepositoryInterface
{

    public function allUsers();
    public function createUser($data);
}