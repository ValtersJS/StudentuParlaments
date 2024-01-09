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
        <form action="../SaveSelectedEvents.php" method="post">
            <div class="container mx-auto mt-10 px-4">
                <div class="flex flex-wrap -mx-2">
                    <?php
                    // session_start();
                    use Core\Repository\ItemRepository;

                    include "..\AutoLoader.php";

                    $request = new ItemRepository();
                    $sql = "SELECT PasakumaID, Nosaukums, Teksts FROM pasakumi";
                    $result = $request->connect()->query($sql);

                    $selectedEvents = isset($_SESSION['selectedEvents']) ? $_SESSION['selectedEvents'] : [];
                    // var_dump($selectedEvents);
                    while ($row = $result->fetch()) {
                        $isChecked = in_array($row['PasakumaID'], $selectedEvents) ? "checked" : "";
                        echo "<div class='w-full md:w-1/3 px-2 mb-4'>";
                        echo "<div class='rounded-lg overflow-hidden shadow-lg bg-white p-4'>";
                        echo "<input type='checkbox' name='selectedEvents[]' value='" . htmlspecialchars($row['PasakumaID']) . "' $isChecked>";
                        echo "<div class='font-bold text-xl mb-2'>" . htmlspecialchars($row['Nosaukums']) . "</div>";
                        echo "<p class='text-gray-700 text-base'>" . htmlspecialchars($row['Teksts']) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="px-4 py-3 mr-20 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                    shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    Saglabā savu izvēli!
                </button>
            </div>
        </form>

        <!-- Pasākumu pievienošana -->
        <?php
        if (isset($_SESSION["permissions"]) && $_SESSION["permissions"] === "admin") {
            ?>
            <form class="pt-20 container mx-auto mb-32" action="../CreateEventScript.php" method="post">
                <h1 class="text-2xl font-bold mb-4">Pievieno jaunu pasākumu!</h1>
                <div class="mb-4">
                    <?php
                    if (isset($_SESSION['nosaukumsError'])) {
                        echo "<p style='color:red;'>" . $_SESSION['nosaukumsError'] . "</p>";
                        unset($_SESSION["nosaukumsError"]);
                    }
                    if (isset($_SESSION['nosaukumsLenError'])) {
                        echo "<p style='color:red;'>" . $_SESSION['nosaukumsLenError'] . "</p>";
                        unset($_SESSION["nosaukumsLenError"]);
                    }
                    ?>
                    <label for="event-name" class="block text-gray-700 text-sm font-bold mb-2">
                        Pasākuma nosaukums
                    </label>
                    <input id="event-name" type="text" name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <?php
                    if (isset($_SESSION['tekstsError'])) {
                        echo "<p style='color:red;'>" . $_SESSION['tekstsError'] . "</p>";
                        unset($_SESSION["tekstsError"]);
                    }
                    if (isset($_SESSION['tekstsLenError'])) {
                        echo "<p style='color:red;'>" . $_SESSION['tekstsLenError'] . "</p>";
                        unset($_SESSION["tekstsLenError"]);
                    }
                    ?>
                    <label for="event-description" class="block text-gray-700 text-sm font-bold mb-2">
                        Pasākuma apraksts
                    </label>
                    <input id="event-description" type="text" name="description"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <input type="submit" value="Pievieno"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
            </form>
            <?php
        } else {
            echo "<p>Jums nav tiesību pievienot pasākumus!</p>";
        }
        ?>
        </div>
    </body>

    </html>

    <?php
    // use Core\Repository\ItemRepository;
    
    // include "..\AutoLoader.php";
    
    // items = ItemRepository::getAll();
    // var_dump($items);
    ?>

</body>

</html>