<?php

namespace Http\Services;

use Http\Repository\Interfaces\UserRepositoryInterface;
use Http\Models\User;

class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->allUsers();
    }

    public function createUser(array $userData)
    {
        return $this->userRepository->createUser($userData);
    }

}
