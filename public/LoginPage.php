<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="..\output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "../templates/header.html"; ?>

    <div class="flex flex-col items-center justify-center min-h-screen pb-12">
        <!-- Login Form -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="../AuthScript.php" method="post">
            <h1 class="block text-gray-800 text-lg font-bold mb-6">Login</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password">
            </div>
            <div class="flex items-center justify-between">
                <input
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" value="Login">
            </div>
        </form>

        <!-- Registration Form -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8" action="../RegisterScript.php" method="post">
            <h1 class="block text-gray-800 text-lg font-bold mb-6">Register</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username-register">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username-register" type="text" name="username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password-register">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password-register" type="password" name="password">
            </div>
            <div class="flex items-center justify-between">
                <input
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" value="Register">
            </div>
        </form>
    </div>
</body>


</html>