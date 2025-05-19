<?php
session_start();
require_once '../../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user from DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Redirect base sa role
        if ($_SESSION['role'] === 'admin') {
            header("Location: ../../public/admin/dashboard.php");
        } else {
            header("Location: ../../public/index.php");
        }
        exit;
    } else {
        // Invalid login
        header("Location: ../../public/login.php?error=1");
        exit;
    }
}
