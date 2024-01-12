<?php
use Core\Repository\AuthRepo;

include "AutoLoader.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selectedEvents'])) {
        // Update session with new selection
        $_SESSION['selectedEvents'] = $_POST['selectedEvents'];

    } else {
        // If no checkboxes were selected, clear the selection
        $_SESSION['selectedEvents'] = [];
        setcookie('saved_data', '', time() - 3600); // Expire the cookie
    }
}

// Redirect back to the events page
header("Location: public/EventPage.php");
exit;