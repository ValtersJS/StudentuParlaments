<!DOCTYPE html>
<html>

<!-- <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="output.css" rel="stylesheet" />
    <script src="https://unpkg.com/htmx.org@1.9.10"
        integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous">
        </script>
</head> -->

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events Table</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- <link href="output.css" rel="stylesheet"> -->
        <style>
        .table-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        </style>
    </head>

    <body class="bg-gray-100">
        <?php include "../templates/header.html"; ?>
        <div class="container mx-auto mt-10">
            <table class="min-w-full table-auto table-shadow bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 tracking-wider">
                            ID</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 tracking-wider">
                            Title</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 tracking-wider">
                            Description</th>
                    </tr>
                </thead>
                <tbody class="custom-row">
                    <?php
                    session_start();
                    use Core\Repository\ItemRepository;

                    include "..\AutoLoader.php";

                    $request = new ItemRepository();
                    $sql = "SELECT PasakumaID, Nosaukums, Teksts FROM pasakumi";
                    $result = $request->connect()->query($sql);
                    while ($row = $result->fetch()) {
                        echo "<tr class='custom-row'>";
                        echo "<td class='px-6 py-4 whitespace-no-wrap border-b custom-border'>" . htmlspecialchars($row['PasakumaID']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-no-wrap border-b custom-border'>" . htmlspecialchars($row['Nosaukums']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-no-wrap border-b custom-border'>" . htmlspecialchars($row['Teksts']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <form class="pt-20" action="../CreateEventScript.php" method="post">
                <h1>Pievieno jaunu pasākumu!</h1>
                <div>
                    <label for="event-name">
                        Pasākuma nosaukums
                    </label>
                    <input id="event-name" type="text" name="name">
                </div>
                <div>
                    <label for="event-description">
                        Pasākuma apraksts
                    </label>
                    <input id="event-description" type="text" name="description">
                </div>
                <div>
                    <input type="submit" value="Create">
                </div>
            </form>
        </div>

    </body>

    </html>

    <?php
    // use Core\Repository\ItemRepository;
    
    // include "..\AutoLoader.php";
    
    // $items = ItemRepository::getAll();
    // var_dump($items);
    ?>

</body>

</html>