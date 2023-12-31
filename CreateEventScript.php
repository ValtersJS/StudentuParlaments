<?php
use Core\Repository\ItemRepository;

include "AutoLoader.php";

// require 'db.php'; // This file should contain the PDO connection code
// require 'AuthClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nosaukums = $_POST['name'];
    $teksts = $_POST['description'];

    // Validation (e.g., check if fields are empty)

    $newEvent = new ItemRepository();
    $event = $newEvent::createEvent($nosaukums, $teksts);

    header('Location: public/EventPage.php');
    // $result = $authenticator::getAllMessages($username, $password);
    echo $event;
    var_dump($event);
}