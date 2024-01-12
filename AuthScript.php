<?php
use Core\Repository\AuthRepo;

// session_start();
include "AutoLoader.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST["Login"]))) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validation 

        $authenticator = new AuthRepo();
        $result = $authenticator->getUser($username, $password);

        if ($result["loginState"] == true) {
            // 
            // session_unset();
            // session_destroy();
            session_start();
            $_SESSION["permissions"] = $result['permissions'];
            $_SESSION["userID"] = $result['userID'];
            $_SESSION["username"] = $username;

            $request = new AuthRepo();
            $sql = $request->connect()->prepare("SELECT Events FROM users WHERE userID = :userID");
            $sql->execute(['userID' => $_SESSION["userID"]]);
            $result = $sql->fetch();

            if ($result && $result['Events']) {
                $_SESSION['selectedEvents'] = json_decode($result['Events'], true);
            }
            header("Location: http://localhost/site/public/EventPage.php");
        } else {
            session_start();
            $_SESSION['notAUser'] = "Šis lietotājs nepastāv";
            header("Location: http://localhost/site/public/LoginPage.php");
            // echo "<h1>Šis lietotājs nepastāv</h1>";
        }

        echo $_SESSION["permissions"];
        var_dump($result);
    } else if (isset($_POST["Logout"])) {
        session_start();

        if (isset($_SESSION['userID'])) {
            $userID = $_SESSION['userID'];

            // Check if there are selected events to save
            if (isset($_SESSION['selectedEvents']) && !empty($_SESSION['selectedEvents'])) {
                $selectedEvents = $_SESSION['selectedEvents'];
                $selectedEventsJson = json_encode($selectedEvents);

                $request = new AuthRepo();
                $sql = $request->connect()->prepare("UPDATE users SET Events = :savedData WHERE userID = :userID");
                $sql->execute(['savedData' => $selectedEventsJson, 'userID' => $userID]);
            }

            session_unset();
            session_destroy();
        }

        header("Location: public/LoginPage.php");
        exit;
    }
}