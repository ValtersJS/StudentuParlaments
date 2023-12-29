<?php

// namespace Core\Repository;

use PDO;
use PDOException;
use FeatureClasess\Message;

class AuthClass extends AbstractItemRepository
{

    public static function getAll($username, $password)
    {
        $request = new ItemRepository();

        $sql = $request->connect()->prepare("SELECT * FROM users WHERE username = ?");
        $sql->execute([$username]);
        $user = $sql->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Success: Username and password matched
            return "Logged in successfully";
            // Additional actions like setting session variables can be done here
        } else {
            // Failure: Username and password didn't match
            return "Invalid username or password";
        }
    }
}