<?php
// redirect.php

if (isset($_POST['redirectTo'])) {
    $url = $_POST['redirectTo'];

    header("Location: $url");
    exit;
}