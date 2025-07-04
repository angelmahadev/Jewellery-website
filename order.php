<?php

session_start();
include 'db.php';

session_start();
$conn = new mysqli('localhost', 'root', '', 'jewellery-store');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$payment_method = $_POST['payment_method'];
$cart = json_decode($_POST['cart'], true); // Get cart data from the form

// Insert billing details into "billing_details" table
$sql = "INSERT INTO billing_details (fullname, email, phone, address, payment_method) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $fullname, $email, $phone, $address, $payment_method);
$stmt->execute();
$billing_id = $stmt->insert_id;
$stmt->close();

// Insert order into "orders" table
$sql = "INSERT INTO orders (billing_id, fullname, email, phone, address) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $billing_id, $fullname, $email, $phone, $address);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert order items into "order_items" table
if (!empty($cart)) {
    foreach ($cart as $cartItem) {
        $product_id = $cartItem['product_id'];
        $quantity = $cartItem['quantity'];

        $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $order_id, $product_id, $quantity);
        $stmt->execute();
    }
    $stmt->close();
}

$conn->close();

// Clear localStorage cart using JavaScript
echo "<script>
        alert('Order placed successfully!');
        localStorage.removeItem('cart');
        window.location.href='index.html';
      </script>";
?>
