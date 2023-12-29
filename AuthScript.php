<?php
use Core\Repository\AuthRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation (e.g., check if fields are empty)

    $authenticator = new AuthRepo();
    $result = $authenticator->getAllMessages($username, $password);
    echo $result;
    var_dump($result);
}