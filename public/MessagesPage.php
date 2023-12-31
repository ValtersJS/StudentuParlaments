<?php
// require_once 'path/to/Core/Repository/MessagesRepo.php'; // Update the path as needed
use Core\Repository\MessagesRepo;

include "..\AutoLoader.php";
$messages = MessagesRepo::getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="output.css" rel="stylesheet" />
    <script src="https://unpkg.com/htmx.org@1.9.10"
        integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous">
        </script>
    <!-- <link href="../output.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <?php include "../templates/header.html"; ?>

    <div class="container mx-auto mt-10">
        <table class="min-w-full table-auto shadow-lg bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        ZinasID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        LietotajaID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Datums</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Teksts</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <?php echo htmlspecialchars($message->getZinasID()); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <?php echo htmlspecialchars($message->getLietotajaID()); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <?php echo htmlspecialchars($message->getDatums()); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <?php echo htmlspecialchars($message->getTeksts()); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- use Core\Repository\MessagesRepo;

    include "..\AutoLoader.php";

    $items = MessagesRepo::getAll();
    var_dump($items); -->


</body>

</html>