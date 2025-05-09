<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $fullName = $_POST['fullName'];
    $email = $_POST['emailAddress'];
    $password = $_POST['userPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate password match
    if ($password !== $confirmPassword) {
        die("<script>alert('❌ Passwords do not match.'); window.history.back();</script>");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullName, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Registration successful! Click OK to login...'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('❌ Error: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | My Website</title>
    <style>
        body {
            background-image: url(6.GIF);
            background-attachment: fixed;
            background-size: 20%;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: blue;
            color: white;
            border: 2px solid white;
            padding: 30px;
            margin: 100px auto;
            width: 500px;
            border-radius: 10px;
        }

        .container h2 {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: white;
            color: blue;
            font-weight: bold;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: lightgray;
        }

        .link-btn {
            display: block;
            margin-top: 15px;
            text-align: center;
        }

        marquee {
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 10px;
        }

        footer {
            margin-top: 50px;
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
        }

        a {
            color: yellow;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .show-pass {
            margin-top: 10px;
            color: yellow;
            font-size: 14px;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            const pass = document.getElementById("userPassword");
            const confirm = document.getElementById("confirmPassword");
            pass.type = pass.type === "password" ? "text" : "password";
            confirm.type = confirm.type === "password" ? "text" : "password";
        }
    </script>
</head>
<body>

<marquee>Create your account Respectively!!!!</marquee>

<div class="container">
    <h2>Create an Account</h2>
    <form method="POST" action="">
        <label>Full Name:</label>
        <input type="text" name="fullName" class="form-control" required>

        <label>Email Address:</label>
        <input type="email" name="emailAddress" class="form-control" required>

        <label>Password:</label>
        <input type="password" name="userPassword" class="form-control" id="userPassword" required>

        <label>Confirm Password:</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>

        <div class="show-pass">
            <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
        </div>

        <button type="submit" class="btn">Register</button>

        <div class="link-btn">
            Already have an account? <a href="login.php">Login</a><br><br>
            Do you need help? <a href="help.php">Click here to Ask for help</a>
        </div>
    </form>
</div>

<footer>
    <p>&copy; 2025 OurSite. All rights reserved.</p>
</footer>

</body>
</html>
