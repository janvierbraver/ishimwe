<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 15px 0 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h3 {
            color: #2c3e50;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Factorial Calculator</h2>
        <form method="post">
            <label for="number">Enter a non-negative number:</label>
            <input type="number" name="number" min="0" required>
            <input type="submit" value="Calculate">
            <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = (int)$_POST["number"];
            $factorial = 1;
            $i = 1;

            if ($number == 0) {
                $factorial = 1;
            } else {
                do {
                    $factorial *= $i;
                    $i++;
                } while ($i <= $number);
            }

            echo "<h3>Factorial of $number is: <strong>$factorial</strong></h3>";
        }
        ?>
    </div>
</body>
</html>
