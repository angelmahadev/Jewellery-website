<?php


include 'db.php';

$sql = "SELECT * FROM orders ORDER BY id DESC"; // Replace 'id' with your actual primary key column

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #cab273;
            color: white;
        }
        h1 {
            text-align: center;
        }
        a.back {
            display: inline-block;
            margin-top: 10px;
            background: #cab273;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h1>Customer Orders</h1>
<a href="admin_panel.php" class="back">← Back to Admin Panel</a>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['fullname'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['address'] ?></td>
        </tr>
    <?php } ?>
</table>



</body>
</html>
