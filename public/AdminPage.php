<?php
use Core\Repository\AuthRepo;

include "../AutoLoader.php";
?>
<!-- $allUsers = AuthRepo::getAll();

foreach ($allUsers as $user) {
    // Process each user
    echo "Username: " . htmlspecialchars($user['Username']) . "<br>";
    // And so on for other user attributes
}

?> -->

<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <link href="..\output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "../templates/header.html"; ?>

    <div class="container mx-auto my-8">
        <form action="../DeleteUserScript.php" method="post">
            <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User ID
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Username
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $allUsers is the array containing user data
                    $allUsers = AuthRepo::getAll();
                    foreach ($allUsers as $user): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($user['UserID']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($user['Username']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                            <input type="checkbox" name="usersToDelete[]"
                                value="<?php echo htmlspecialchars($user['UserID']); ?>" class="form-checkbox h-4 w-4">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete Selected Users
            </button>
        </form>
    </div>
    <?php include '../templates/eventsAdmin.html'; ?>
</body>

</html>