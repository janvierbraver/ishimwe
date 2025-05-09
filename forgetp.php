<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Simulate sending email
        echo "<script>alert('✅ Password reset link would be sent to $email.');</script>";
    } else {
        echo "<script>alert('❌ No account found with that email.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial;
        }

        .container {
            background-color: white;
            width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px gray;
        }

        h2 {
            text-align: center;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        .btn {
            background-color: blue;
            color: white;
            padding: 10px;
            width: 100%;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: darkblue;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>
    <form method="POST" action="">
        <label>Enter your registered email address:</label>
        <input type="email" name="email" class="form-control" required>

        <button type="submit" class="btn">Send Reset Link</button>

        <div class="back-link">
            <a href="login.php">Back to Login</a>
        </div>
    </form>
</div>

</body>
</html>
