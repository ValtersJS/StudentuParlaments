<?php
use Core\Repository\ItemRepository;

include "AutoLoader.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nosaukums = htmlspecialchars(trim($_POST['name']));
    $teksts = htmlspecialchars(trim($_POST['description']));

    session_start();

    // Validācija
    if (empty($nosaukums) || empty($teksts)) {
        if (empty($nosaukums)) {
            // Set an error message in the session
            $_SESSION['nosaukumsError'] = 'Nosaukums nevar būt tukšs';
        }
        if (empty($teksts)) {
            // Set an error message in the session
            $_SESSION['tekstsError'] = 'Teksts nevar būt tukšs';
        }
        // Redirect back to the form page
        header('Location: public/EventPage.php');
        exit;
    } else if (strlen($nosaukums) <= 3 || strlen($teksts) <= 3) {
        if (strlen($nosaukums) <= 3) {
            $_SESSION['nosaukumsLenError'] = 'Nosaukumam jābut garākam par 3 zīmēm';
        }
        if (strlen($teksts) <= 3) {
            $_SESSION['tekstsLenError'] = 'Tekstam jābut garākam par 3 zīmēm';
        }
        header('Location: public/EventPage.php');
        exit;
    }

    $newEvent = new ItemRepository();
    $event = $newEvent::createEvent($nosaukums, $teksts);

    header('Location: public/EventPage.php');
    // $result = $authenticator::getAllMessages($username, $password);
    echo $event;
    var_dump($event);
}