<?php
use Core\Repository\AuthRepo;

include "AutoLoader.php";

// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['usersToDelete'])) {
//         $userIdToDelete = $_POST['usersToDelete'];
//         AuthRepo::deleteUser($userIdToDelete);
//     } else {
//         header("Location: public/AdminPage.php");
//         exit;
//     }
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usersToDelete'])) {
        foreach ($_POST['usersToDelete'] as $userIdToDelete) {
            // Call the deleteUser method for each selected user ID
            AuthRepo::deleteUser($userIdToDelete);
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