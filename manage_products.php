<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    $imagePath = $uploadDir . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    $id = time(); // unique id using timestamp
$newProduct = [
    'id' => $id,
    'name' => htmlspecialchars($name),
    'price' => floatval($price),
    'image' => $imagePath
];


    $jsonFile = 'products.json';
    $products = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];
    $products[] = $newProduct;

    file_put_contents($jsonFile, json_encode($products, JSON_PRETTY_PRINT));
    header("Location: manage_products.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <style>
        body { font-family: Poppins, sans-serif; background: #fdf6f0; padding: 40px; }
        form {
            max-width: 400px; margin: auto;
            background: white; padding: 20px;
            border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%; padding: 10px;
            margin: 10px 0;
        }
        button {
            background: #f4a261; color: white; border: none;
            cursor: pointer; border-radius: 4px;
        }
        .success { text-align: center; color: green; }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <h2>Upload New Product</h2>
        <?php if (isset($_GET['success'])) echo '<p class="success">Product uploaded!</p>'; ?>
        <input type="file" name="image" required>
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
