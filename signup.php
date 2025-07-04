<?php
// Start session
session_start();

// Initialize variables
$error_message = '';
$success_message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Simple validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $error_message = "Password must be at least 6 characters long";
    } else {
        // Check if users.json exists, if not create an empty array
        $users = [];
        if (file_exists('users.json')) {
            $users = json_decode(file_get_contents('users.json'), true);
        }
        
        // Check if username already exists
        $username_exists = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $username_exists = true;
                break;
            }
        }
        
        if ($username_exists) {
            $error_message = "Username already exists. Please choose another one.";
        } else {
            // Add new user
            $users[] = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) // Securely hash the password
            ];
            
            // Save to file
            file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
            
            // Set success message
            $success_message = "Registration successful! You can now login.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Jewellery Website</title>
    
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="product.css">
    <!--==========fav-icon=========-->
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* Form Specific Styles */
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #3e4444;
            font-family: 'Ovo', serif;
            font-size: 28px;
        }
        
        .auth-form input[type="text"],
        .auth-form input[type="email"],
        .auth-form input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .auth-form input[type="text"]:focus,
        .auth-form input[type="email"]:focus,
        .auth-form input[type="password"]:focus {
            border-color: #3e4444;
            outline: none;
        }
        
        .auth-form label {
            display: block;
            margin-bottom: 8px;
            color: #3e4444;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        
        .auth-form button {
            width: 100%;
            padding: 12px;
            background-color: #3e4444;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .auth-form button:hover {
            background-color: #333;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
            color: #666;
        }
        
        .form-footer a {
            color: #3e4444;
            text-decoration: none;
            font-weight: 500;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .success-message {
            color: #2ecc71;
            margin-bottom: 15px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    

    <!-- Sign Up Form Section -->
    <div class="form-container">
        <h2 class="form-title">Create an Account</h2>
        
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <form class="auth-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Choose a username">
            </div>
            
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
            </div>
            
            <div>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
            </div>
            
            <button type="submit">Sign Up</button>
        </form>
        
        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer style="background-color: #3e4444; color: white; text-align: center; padding: 20px; margin-top: 50px;">
        <p>&copy; 2025 Modern Minima Jewellery. All Rights Reserved.</p>
    </footer>

</body>
</html>
