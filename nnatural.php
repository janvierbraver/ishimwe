<!DOCTYPE html>
<html>
<head>
    <title>Sum of Natural Numbers</title>
    <style>
        body {
            background-color: #f2f2f2;
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
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #d9534f;
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #8a2be2;
            font-weight: bold;
            margin-bottom: 10px;
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
            background-color: green;
            color: chocolate;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculate Sum of First N Natural Numbers</h2>
        <form method="post">
            <label for="number">Enter a positive number (N):</label>
            <input type="number" name="number" min="1" required>
            <input type="submit" value="Calculate Sum">
            <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = (int)$_POST["number"];
            $sum = 0;
            $i = 1;

            while ($i <= $n) {
                $sum += $i;
                $i++;
            }

            echo "<div class='result'>The sum of the first $n natural numbers is: <strong>$sum</strong></div>";
        }
        ?>
    </div>
</body>
</html>
