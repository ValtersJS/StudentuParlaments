<?php
// redirect.php

if (isset($_POST['redirectTo'])) {
    $url = $_POST['redirectTo'];

    // Optionally add validation to ensure the URL is safe to redirect to
    // Perform the redirection
    header("Location: $url");
    exit;
}