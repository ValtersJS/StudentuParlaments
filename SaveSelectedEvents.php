<?php
session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedEvents'])) {
//     $_SESSION['selectedEvents'] = $_POST['selectedEvents'];
// }

// // Redirect back to the events page or another appropriate page
// header("Location: public/EventPage.php"); // Replace with the actual page you want to redirect to
// exit;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming the checkboxes are named 'selectedEvents[]'
    if (isset($_POST['selectedEvents'])) {
        // Update session with new selection
        $_SESSION['selectedEvents'] = $_POST['selectedEvents'];

        // Optionally update cookie
        setcookie('saved_data', json_encode($_POST['selectedEvents']), time() + 86400 * 30); // 30-day expiry
    } else {
        // If no checkboxes were selected, clear the selection
        $_SESSION['selectedEvents'] = [];
        setcookie('saved_data', '', time() - 3600); // Expire the cookie
    }
}

// Redirect back to the events page
header("Location: public/EventPage.php");
exit;