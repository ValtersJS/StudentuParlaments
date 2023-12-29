<?php

namespace Core\Repository;

use Core\Repository\AbstractItemRepository;

class AuthRepo extends AbstractItemRepository
{
    public static function getAll()
    {
        return;
    }

    public static function getAllMessages($username, $password)
    {
        $request = new AuthRepo();

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