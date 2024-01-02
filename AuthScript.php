<?php

use Core\Repository\AuthRepo;

// session_start();
include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST["Login"]))) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validation (e.g., check if fields are empty)

        $authenticator = new AuthRepo();
        $result = $authenticator->getUser($username, $password);

        if ($result["loginState"] == true) {
            // header("Location: http://localhost/site/public/EventPage.php");
            // 
            session_unset();
            session_destroy();
            // session_start();
            $_SESSION["permissions"] = $result['permissions'];
            $_SESSION["userID"] = $result['userID'];
            $_SESSION["username"] = $username;
        } else {
            echo "<h1>Šis lietotājs nepastāv</h1>";
        }

        echo $_SESSION["permissions"];
        var_dump($result);
    } else if (isset($_POST["Logout"])) {
        session_start();


        session_unset();
        session_destroy();
        // setcookie(session_name(), '', 0, '/'); // Clear session cookie
        sleep(1);
        // header("Location: http://localhost/site/public/EventPage.php");
        var_dump($_SESSION);
    }
}