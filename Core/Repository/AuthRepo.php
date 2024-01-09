<?php
namespace Core\Repository;

// session_start();
use Core\Repository\AbstractItemRepository;

class AuthRepo extends AbstractItemRepository
{
    public static function getAll()
    {
        $request = new AuthRepo();

        // Prepare and execute the SQL statement
        $sql = $request->connect()->prepare("SELECT * FROM users");
        $sql->execute();
        $users = $sql->fetchAll();

        return $users;
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
            $userID = $user['UserID'];
            return [
                'loginState' => $loginState,
                'permissions' => $permissions,
                'userID' => $userID
            ];
            // return $loginState;
            // Additional actions like setting session variables can be done here
        } else {
            // Failure: Username and password didn't match
            $loginState = false;
            return $loginState;
        }
    }

    public static function deleteUser($userId)
    {
        $request = new AuthRepo();

        // Prepare the SQL statement to delete a user
        $sql = $request->connect()->prepare("DELETE FROM users WHERE UserID = ?");
        $sql->execute([$userId]);

        // Check if the delete operation was successful
        if ($sql->rowCount() > 0) {
            return true; // User was successfully deleted
        } else {
            return false; // No user was deleted (possibly because the user was not found)
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