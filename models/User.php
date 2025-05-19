<?php
require_once __DIR__ . '/../config/db.php';

class User
{
    public static function register($name, $email, $password, $role = 'user')
    {
        global $conn;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $hashedPassword, $role]);
    }

    public static function login($email)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
