<?php
session_start();
use Core\Repository\MessagesRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teksts = htmlspecialchars(trim($_POST['message']));
    $lietotajaID = $_SESSION['userID'];

    session_start();

    if (empty($teksts)) {
        $_SESSION['messageError'] = 'Ziņa nevar būt tukša';
        header('Location: public/MessagesPage.php');
        exit;
    }

    // Validation (e.g., check if fields are empty)
    // if ($teksts != '') {
    $newEvent = new MessagesRepo();
    $event = $newEvent::createMessage($lietotajaID, $teksts);
    header('Location: public/MessagesPage.php');
    // } else {
    //     // return "Ievadlauks ir tukšs";
    //     echo '<script>';
    //     echo 'alert("Ievadlauks ir tukšs");';
    //     echo 'window.location.href="public/MessagesPage.php";';
    //     echo '</script>';
    //     exit;
    // }
    // $result = $authenticator::getAllMessages($username, $password);
}