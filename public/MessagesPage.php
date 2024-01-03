<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <?php include "../templates/header.html"; ?>

    <div class="container mx-auto mt-10">
        <?php
        use Core\Repository\MessagesRepo;

        include "..\AutoLoader.php";
        $messages = MessagesRepo::getAll();

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
            </div>
        <?php endforeach; ?>
        <?php
        // session_start();
        if (isset($_SESSION["permissions"])) {
            if ($_SESSION["permissions"] === "registered" || "admin") {
                ?>
                <div class="mt-10 bg-white p-6 rounded-lg shadow">
                    <form action="../CreateMessageScript.php" method="post">
                        <div class="mb-4">
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
            echo "<p>Jums ir jāreģistrējas, lai publicētu komentārus</p>";
        }
        ?>
    </div>
</body>

</html>