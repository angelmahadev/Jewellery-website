<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - CraveCulture</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .nav-upper {
            background-color: #cab273;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .nav-upper a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 6px 16px;
            border-radius: 4px;
        }
        .nav-upper a:hover {
            background: rgba(255,255,255,0.2);
            text-decoration: underline;
        }
        .admin-options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .admin-card {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .admin-card a {
            background-color: #cab273;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header>
    <div class="nav-upper">
        <div style="display: flex; align-items: center;">
            <img src="images/logo.png" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px;">
            <span style="font-size: 24px; font-weight: bold; color: white;">ModernMinima Admin</span>
        </div>
        <nav>
            <a href="logout.php" style="background: #cab273;">Logout</a>
        </nav>
    </div>
</header>

<section>
    <h1 style="text-align: center; margin-top: 30px;">Admin Panel</h1>
    <div class="admin-options">

        <div class="admin-card">
            <h2>Manage Products</h2>
            <p>Add, edit, or delete products.</p>
            <a href="manage_products.php">Go</a>
        </div>
        <div class="admin-card">
            <h2>View Orders</h2>
            <p>Check customer orders and statuses.</p>
            <a href="manage_orders.php">Go</a>
        </div>
    </div>
</section>

<footer style="text-align: center; padding: 20px; background: #cab273; color: white;">
    <p>&copy; 2025 ModernMinima | All Rights Reserved.</p>
</footer>

</body>
</html>
