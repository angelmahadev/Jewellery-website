<?php
// Start session
session_start();

// Initialize error message variable
$error_message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Check if users.json exists
    if (file_exists('users.json')) {
        $users = json_decode(file_get_contents('users.json'), true);
        
        // Find user by username
        $user_found = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $user_found = true;
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Successful login - set session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    
                    // Redirect to index page
                    header("Location: index.php");
                    exit;
                } else {
                    $error_message = "Invalid password. Please try again.";
                }
                break;
            }
        }
        
        if (!$user_found) {
            $error_message = "Username not found. Please register or try again.";
        }
    } else {
        $error_message = "No registered users found. Please sign up first.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jewellery Website</title>
    
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
        /* Login Form Specific Styles */
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
    </style>
</head>
<body>

    <!-- Header Section -->
    

    <!-- Login Form Section -->
    <div class="form-container">
        <h2 class="form-title">Login to Your Account</h2>
        
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <form class="auth-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <div class="form-footer">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <p><a href="#">Forgot Password?</a></p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer style="background-color: #3e4444; color: white; text-align: center; padding: 20px; margin-top: 50px;">
        <p>&copy; 2025 Modern Minima Jewellery. All Rights Reserved.</p>
    </footer>

</body>
</html>
