<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="..\output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="background-color: #E7E6E1">
    <?php include "../templates/header.html"; ?>

    <div class="flex flex-col items-center justify-center min-h-screen pb-12">
        <!-- Login Form -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="../AuthScript.php" method="post">
            <h1 class="block text-gray-800 text-lg font-bold mb-6">Pierakstīšanās</h1>
            <div class="mb-4">
                <?php
                if (isset($_SESSION['notAUser'])) {
                    echo "<p style='color:red;'>" . $_SESSION['notAUser'] . "</p>";
                    unset($_SESSION["notAUser"]);
                }
                ?>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Lietotājvārds
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Parole
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password">
            </div>
            <div class="flex items-center justify-between">
                <input
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" name="Login" value="Pierakstīties">
            </div>
        </form>

        <!-- Registration Form -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8" action="../RegisterScript.php" method="post">
            <h1 class="block text-gray-800 text-lg font-bold mb-6">Register</h1>
            <?php
            if (isset($_SESSION['regRez'])) {
                echo "<p style='color:green;'>" . $_SESSION['regRez'] . "</p>";
                unset($_SESSION["regRez"]);
            }
            ?>
            <div class="mb-4">
                <?php
                if (isset($_SESSION['usernameError'])) {
                    echo "<p style='color:red;'>" . $_SESSION['usernameError'] . "</p>";
                    unset($_SESSION["usernameError"]);
                }
                if (isset($_SESSION['usernameLenError'])) {
                    echo "<p style='color:red;'>" . $_SESSION['usernameLenError'] . "</p>";
                    unset($_SESSION["usernameLenError"]);
                }
                ?>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username-register">
                    Lietotājvārds
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username-register" type="text" name="username">
            </div>
            <div class="mb-6">
                <?php
                if (isset($_SESSION['passwordError'])) {
                    echo "<p style='color:red;'>" . $_SESSION['passwordError'] . "</p>";
                    unset($_SESSION["passwordError"]);
                }
                if (isset($_SESSION['passwordLenError'])) {
                    echo "<p style='color:red;'>" . $_SESSION['passwordLenError'] . "</p>";
                    unset($_SESSION["passwordLenError"]);
                }
                ?>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password-register">
                    Parole
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password-register" type="password" name="password">
            </div>
            <div class="flex items-center justify-between">
                <input
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" value="Reģistrēties">
            </div>
        </form>
    </div>
</body>


</html>