<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- <link href="..\output.css" rel="stylesheet" /> -->
</head>

<body>
    <div>
        <form action=" ../AuthScript.php" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>

        <form action="../RegisterScript.php" method="post">
            <h1>Register</h1>
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>