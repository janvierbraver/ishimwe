<!DOCTYPE html>
<html>
<head>
    <title>Reverse a Number</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        h3 {
            margin-top: 20px;
            color: #2d3436;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reverse an Integer</h2>
        <form method="post">
            <label for="number">Enter an integer:</label>
            <input type="number" name="number" required>
            <input type="submit" value="Reverse">
            <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = (int)$_POST["number"];
            $original = $number;
            $reverse = 0;

            // Handle negative numbers
            $isNegative = false;
            if ($number < 0) {
                $isNegative = true;
                $number = -$number;
            }

            while ($number > 0) {
                $digit = $number % 10;
                $reverse = ($reverse * 10) + $digit;
                $number = (int)($number / 10);
            }

            if ($isNegative) {
                $reverse = -$reverse;
            }

            echo "<h3>Original Number: $original</h3>";
            echo "<h3>Reversed Number: $reverse</h3>";
        }
        ?>
    </div>
</body>
</html>
