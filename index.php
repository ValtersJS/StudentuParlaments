<?php
session_start();

$_SESSION["username"] = "Valters";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="output.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- <script src="https://unpkg.com/htmx.org@1.9.10"
        integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous">
        </script> -->
</head>

<body class="bg-gray-400">
    <?php include "templates\header.html";

    echo $_SESSION["username"];
    ?>
</body>

</html>