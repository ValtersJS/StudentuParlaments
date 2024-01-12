<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function editMessage(messageId) {
            // Example: Populate and show an edit form
            // This can be a modal or a visible form in your page
            document.getElementById('editMessageId').value = messageId;
            document.getElementById('editForm').style.display = 'block';
        }
    </script>
    <style>
        /* Custom Specular Gradient */
        .specular-gradient {
            background: linear-gradient(135deg, rgba(67, 118, 108, 0.5) 10%, #43766c 100%);
        }
    </style>
</head>

<body style="background-color: #E7E6E1">
    <?php include "../templates/header.html"; ?>

    <!-- Sort -->
    <form action="" method="GET">
        <select name="sort" onchange="this.form.submit()">
            <option value="date" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'date') ? 'selected' : ''; ?>>
                Kārtot pēc datuma</option>
            <option value="user" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'user') ? 'selected' : ''; ?>>
                Kārtot pēc lietotāja</option>
        </select>
    </form>


    <div class="container mx-auto mt-10">
        <?php
        use Core\Repository\MessagesRepo;

        include "..\AutoLoader.php";

        // Get the sort parameter from the GET request
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
        $messages = MessagesRepo::getAll($sort);

        foreach ($messages as $message): ?>
            <div class="bg-white p-6 rounded-lg shadow mb-4">
                <div class="mb-2">
                    <span class="text-gray-700 font-semibold">Sūtītājs:
                        <?php echo htmlspecialchars($message->getLietotajaID()); ?>
                    </span>
                    <span class="text-gray-600 text-sm"> datums
                        <?php echo htmlspecialchars($message->getDatums()); ?>
                    </span>
                </div>
                <div class="mb-4 text-gray-800">
                    <?php echo htmlspecialchars($message->getTeksts()); ?>
                </div>
                <?php
                if (isset($_SESSION['userID']) && $_SESSION['userID'] == $message->getLietotajaID()) {
                    // Display edit button
                    echo "<button onclick='editMessage(" . $message->getZinasID() . ")' class='specular-gradient text-white font-bold py-2 mb-2 px-4 rounded shadow hover:shadow-lg transition ease-in-out duration-300'>Izmaini</button>";

                }
                ?>
            </div>
        <?php endforeach; ?>

        <!-- edit section -->
        <div id="editForm" style="display:none;">
            <form action="../CreateMessageScript.php" method="post">
                <input type="hidden" id="editMessageId" name="messageId">
                <textarea name="newMessage" rows="4" placeholder="Izmaini savu ziņu"></textarea>
                <button type="submit">Izmaini</button>
            </form>
        </div>

        <!-- Message Posting Section -->
        <?php
        // session_start();
        if (isset($_SESSION["permissions"])) {
            if ($_SESSION["permissions"] === "registered" || $_SESSION["permissions"] === "admin") {
                ?>
                <div class="mt-10 bg-white p-6 rounded-lg shadow">
                    <form action="../CreateMessageScript.php" method="post">
                        <div class="mb-4">
                            <?php
                            if (isset($_SESSION['messageError'])) {
                                echo "<p style='color:red;'>" . $_SESSION['messageError'] . "</p>";
                                unset($_SESSION["messageError"]);
                            }
                            ?>
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Jūsu ziņa:</label>
                            <textarea id="message" name="message" rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Raksti savu ziņu šeit..."></textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sūtīt
                            ziņu</button>
                    </form>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center text-lg'>Jums ir jāreģistrējas, lai publicētu komentārus</p>";
        }
        ?>
    </div>
</body>

</html>