<?php
session_start();
use Core\Repository\MessagesRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teksts = $_POST['message'];
    $lietotajaID = $_SESSION['userID'];

    // Validation (e.g., check if fields are empty)
    if ($teksts != '') {
        $newEvent = new MessagesRepo();
        $event = $newEvent::createMessage($lietotajaID, $teksts);
        header('Location: public/MessagesPage.php');
    } else {
        // return "Ievadlauks ir tukšs";
        echo '<script>';
        echo 'alert("Ievadlauks ir tukšs");';
        echo 'window.location.href="public/MessagesPage.php";';
        echo '</script>';
        exit;
    }
    // $result = $authenticator::getAllMessages($username, $password);
    echo $event;
    var_dump($event);
}