<?php
session_start();
use Core\Repository\MessagesRepo;

include "AutoLoader.php";

// Check if it's a message creation request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $teksts = htmlspecialchars(trim($_POST['message']));
    $lietotajaID = $_SESSION['userID'];

    if (empty($teksts)) {
        $_SESSION['messageError'] = 'Ziņa nevar būt tukša';
    } else {
        $newMessage = new MessagesRepo();
        $newMessage::createMessage($lietotajaID, $teksts);
    }
    header('Location: public/MessagesPage.php');
    exit;
}

// Check if it's a message editing request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['messageId'], $_POST['newMessage'])) {
    $messageId = $_POST['messageId'];
    $newMessage = htmlspecialchars(trim($_POST['newMessage']));

    // Validation on $newMessage

    $result = MessagesRepo::updateMessage($messageId, $newMessage);
    if ($result) {
        // Set a success message in session or handle accordingly
    } else {
        // Set an error message in session or handle accordingly
    }
    header('Location: public/MessagesPage.php');
    exit;
}