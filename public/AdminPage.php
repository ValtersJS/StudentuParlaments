<?php
use Core\Repository\AuthRepo;
use Core\Repository\ItemRepository;

include "../AutoLoader.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <link href="..\output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="background-color: #E7E6E1">
    <?php include "../templates/header.html"; ?>
    <?php
    if (isset($_SESSION["permissions"]) && $_SESSION["permissions"] === "admin") {
        ?>

    <?php include '../templates/usersAdmin.html'; ?>

    <?php include '../templates/eventsAdmin.html'; ?>
    <?php
    } else {
        echo "<p class='text-center text-2xl font-bold my-4'>Jums nav administratora tiesību!</p>";
    }
    ?>
</body>

</html>