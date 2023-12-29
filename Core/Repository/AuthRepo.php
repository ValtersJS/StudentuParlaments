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

        if ($user && password_verify($password, $user['Password'])) {
            // if ($user && $password == $user["Password"]) {
            // Success: Username and password matched
            return "Logged in successfully";
            // Additional actions like setting session variables can be done here
        } else {
            // Failure: Username and password didn't match
            return "Invalid username or password";
        }
    }

    public static function registerUser($username, $password)
    {
        $request = new AuthRepo();

        $sql = $request->connect()->prepare("SELECT * FROM users WHERE username = ?");
        $sql->execute([$username]);
        $user = $sql->fetch();

        if ($user === false) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertSql = $request->connect()->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insertSql->execute([$username, $hashedPassword]);
            $rez = $insertSql ? "Registration successful" : "Registration failed";
        } else {
            $rez = "User already exists!";
        }
        return $rez;
    }
}