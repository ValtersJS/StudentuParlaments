<?php
session_start();
use Core\Repository\MessagesRepo;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nosaukums = $_POST['name'];
    $teksts = $_POST['description'];

    // Validation (e.g., check if fields are empty)

    $newEvent = new MessagesRepo();
    $event = $newEvent::createMessage($lietotajaID, $teksts);

    header('Location: public/MessagesPage.php');
    // $result = $authenticator::getAllMessages($username, $password);
    echo $event;
    var_dump($event);
}