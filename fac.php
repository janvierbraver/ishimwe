<!DOCTYPE html>
<html>
<head>
    <title>Prime Number Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9f5ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        h3 {
            color: #2d3436;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Prime Number Checker</h2>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" min="1" required>
            <input type="submit" value="Check">
            <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = (int)$_POST["number"];
            $isPrime = true;

            if ($number <= 1) {
                $isPrime = false;
            } else {
                for ($i = 2; $i <= sqrt($number); $i++) {
                    if ($number % $i == 0) {
                        $isPrime = false;
                        break;
                    }
                }
            }

            if ($isPrime) {
                echo "<h3>$number is a <strong style='color: green;'>Prime</strong> number.</h3>";
            } else {
                echo "<h3>$number is <strong style='color: red;'>Not Prime</strong>.</h3>";
            }
        }
        ?>
    </div>
</body>
</html>
