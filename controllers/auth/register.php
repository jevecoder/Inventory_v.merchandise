<?php
session_start();
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role']; // admin or user

    $success = User::register($name, $email, $password, $role);

    if ($success) {
        $_SESSION['success'] = "Registration successful. You can login now.";
        header("Location: ../../public/login.php");
        exit;
    } else {
        $_SESSION['error'] = "Registration failed. Try again.";
        header("Location: ../../public/register.php");
        exit;
    }
}
