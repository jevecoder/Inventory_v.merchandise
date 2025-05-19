<?php
session_start();

// Kung hindi naka-login, i-redirect sa login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Kung role ay 'admin', i-redirect sa admin dashboard
if ($_SESSION['role'] === 'admin') {
    header("Location: admin/dashboard.php");
    exit;
}

// Kung role ay 'user', magpatuloy lang sa inventory table view
?>

<?php include '../views/header.php'; ?>

<h2>Inventory Table</h2>
<!-- dito mo ipapakita ang inventory data para sa user -->

<?php include '../views/footer.php'; ?>