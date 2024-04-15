<?php


require __DIR__ . '/autoload.php';

use Http\Services\UserService;
use Http\Repository\UserRepositoryFactory;


$userSource = require __DIR__ . '/config.php';


$userRepository = UserRepositoryFactory::create($userSource['user_source']);

$usersService = new UserService($userRepository);



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $users = $usersService->getAllUsers();

    echo json_encode($users);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data['email']=$_POST['email'];
    $data['name']=$_POST['name'];
    $newUser = $usersService->createUser($data);
    echo json_encode($newUser);
} else {
    http_response_code(405);
}
