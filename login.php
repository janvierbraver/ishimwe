<?php
session_start();

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "website");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $fullName, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['full_name'] = $fullName;
            // Redirect to home page
            header("Location: home.html");
            exit;
        } else {
            echo "<script>alert('❌ Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('❌ No account found with that email');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body  {
            background-image: url(5.jpg);
            background-attachment: fixed;
            background-size: 20%;
            font-family: Arial, sans-serif;
        }

        {
            background-color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: yellowgreen;
            color: white;
            padding: 30px;
            margin: 150px auto;
            width: 400px;
            border-radius: 10px;
        }
        input {
            padding: 8px;
            width: 90%;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            
        }
        button {
            padding: 10px;
            width: 95%;
            background-color: yellow;
            border: none;
            color: black;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2 align="center">User Login</h2>
    <form method="POST" action="">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button><br><br>
        Forgot your password? <a href="forgetp.php">Reset Password</a><br><br><br>
        Don't you have an account? <button><a href="reg.php"> Click here to Sign Up</a></button>
    </form>
</div>

</body>
</html>
