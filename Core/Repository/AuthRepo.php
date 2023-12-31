<?php

namespace Core\Repository;

use Core\Repository\AbstractItemRepository;

class AuthRepo extends AbstractItemRepository
{
    public static function getAll()
    {
        return;
    }

    public static function getUser($username, $password)
    {
        $request = new AuthRepo();

        $sql = $request->connect()->prepare("SELECT * FROM users WHERE username = ?");
        $sql->execute([$username]);
        $user = $sql->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            // if ($user && $password == $user["Password"]) {
            // Success: Username and password matched
            $loginState = true;
            $permissions = $user['Permissions'];
            return [
                'loginState' => $loginState,
                'permissions' => $permissions
            ];
            // return $loginState;
            // Additional actions like setting session variables can be done here
        } else {
            // Failure: Username and password didn't match
            $loginState = false;
            return $loginState;
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
            $insertSql = $request->connect()->prepare("INSERT INTO users (username, password, permissions) VALUES (?, ?, ?)");
            $insertSql->execute([$username, $hashedPassword, "registered"]);
            $rez = $insertSql ? "Registration successful" : "Registration failed";
        } else {
            $rez = "User already exists!";
        }
        return $rez;
    }
}