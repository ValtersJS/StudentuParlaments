<?php
// redirect.php

if (isset($_GET['redirectTo'])) {
    $url = $_GET['redirectTo'];

    // Optionally add validation to ensure the URL is safe to redirect to

    // Perform the redirection
    header("Location: $url");
    exit;
}
