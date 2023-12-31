<?php
session_start();

use Core\Repository\AuthRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation (e.g., check if fields are empty)

    $authenticator = new AuthRepo();
    $result = $authenticator->getUser($username, $password);

    if ($result["loginState"] == true) {
        // header("Location: http://localhost/site/public/EventPage.php");
    } else {
        echo "<h1>Šis lietotājs nepastāv</h1>";
    }
    $_SESSION["permissions"] = $result['permissions'];
    echo $_SESSION["permissions"];
    var_dump($result);
}