<?php
use Core\Repository\AuthRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    session_start();
    // Validācija

    if (empty($username) || empty($password)) {
        if (empty($username)) {
            // Set an error message in the session
            $_SESSION['usernameError'] = 'Lietotājvārds nevar būt tukša';
        }
        if (empty($password)) {
            // Set an error message in the session
            $_SESSION['passwordError'] = 'Parole nevar būt tukša';
        }
        // Redirect back to the form page
        header('Location: public/LoginPage.php');
        exit;
    } else if (strlen($username) <= 3 || strlen($password) <= 3) {
        if (strlen($username) <= 3) {
            $_SESSION['usernameLenError'] = 'Lietotājvārdam jābut garākam par 3 zīmēm';
        }
        if (strlen($password) <= 4) {
            $_SESSION['passwordLenError'] = 'Parolei jābut garākai par 4 zīmēm';
        }
        header('Location: public/LoginPage.php');
        exit;
    }

    // Sekmīgi
    $authenticator = new AuthRepo();
    $user = $authenticator::registerUser($username, $password);

    if ($user) {
        $_SESSION['regRez'] = $user;
    }

    header("Location: http://localhost/site/public/LoginPage.php");
}