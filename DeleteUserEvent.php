<?php
use Core\Repository\AuthRepo;
use Core\Repository\ItemRepository;

include "AutoLoader.php";

// session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if usersToDelete is set and not empty
    if (!empty($_POST['usersToDelete'])) {
        foreach ($_POST['usersToDelete'] as $userIdToDelete) {
            AuthRepo::deleteUser($userIdToDelete);
        }
    }

    // Check if eventsToDelete is set and not empty
    if (!empty($_POST['eventsToDelete'])) {
        foreach ($_POST['eventsToDelete'] as $pasakumaID) {
            ItemRepository::deleteEvent($pasakumaID);
        }
    }

    // Redirect back to the admin page after processing
    header("Location: public/AdminPage.php");
    exit;
} else {
    // Redirect if the form wasn't submitted
    header("Location: public/AdminPage.php");
    exit;
}