<?php
use AuthClass;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation (e.g., check if fields are empty)

    $authenticator = new AuthClass();
    $result = $authenticator->getAll($username, $password);
    echo $result;
}