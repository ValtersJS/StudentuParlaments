<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .table-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body style="background-color: #E7E6E1">
    <?php include "../templates/header.html"; ?>
    <div class="container mx-auto mt-10 px-4">
        <!-- Search Bar -->
        <div class="my-4 text-center">
            <input type="text" id="search" placeholder="Meklē pasākumu..."
                class="p-2 rounded border focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <form action="../SaveSelectedEvents.php" method="post">
            <div class="flex flex-wrap -mx-2">
                <?php
                // session_start();
                use Core\Repository\ItemRepository;

                include "..\AutoLoader.php";

                $request = new ItemRepository();
                $sql = "SELECT PasakumaID, Nosaukums, Teksts FROM pasakumi";
                $result = $request->connect()->query($sql);

                $selectedEvents = isset($_SESSION['selectedEvents']) ? $_SESSION['selectedEvents'] : [];

                while ($row = $result->fetch()) {
                    $isChecked = in_array($row['PasakumaID'], $selectedEvents) ? "checked" : "";
                    echo "<div class='w-full md:w-1/3 px-2 mb-4 event-card'>";
                    echo "<div class='rounded-lg overflow-hidden shadow-lg bg-white p-4'>";
                    echo "<input type='checkbox' name='selectedEvents[]' value='" . htmlspecialchars($row['PasakumaID']) . "' $isChecked>";
                    echo "<div class='font-bold text-xl mb-2 event-name'>" . htmlspecialchars($row['Nosaukums']) . "</div>";
                    echo "<p class='text-gray-700 text-base event-description'>" . htmlspecialchars($row['Teksts']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
            <?php
            if (isset($_SESSION["permissions"]) && ($_SESSION["permissions"] === "admin" || $_SESSION["permissions"] === "registered")) {
                echo '<div class="px-4 py-3 mr-20 text-center sm:px-6">';
                echo '<button type="submit" class="inline-flex justify-center py-2 px-4 ml-20 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">';
                echo 'Saglabā savu izvēli!';
                echo '</button>';
                echo '</div>';
            }
            ?>
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
            echo "<div class='text-center'><p>Jums nav tiesību pievienot pasākumus!</p></div>";
        }
        ?>
    </div>
    <script>
        const searchInput = document.getElementById("search");
        const eventCards = document.querySelectorAll(".event-card");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();

            eventCards.forEach((card) => {
                const eventName = card.querySelector(".event-name").textContent.toLowerCase();
                const eventDescription = card.querySelector(".event-description").textContent.toLowerCase();

                if (eventName.includes(searchTerm) || eventDescription.includes(searchTerm)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>