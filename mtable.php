<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
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
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h3 {
            margin-top: 30px;
            color: #007bff;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            text-align: left;
        }

        li {
            background-color: #e9ecef;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Multiplication Table</h2>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" required>
            <input type="submit" value="Show Table">
            <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = (int)$_POST["number"];
            echo "<h3>Multiplication Table for $number</h3>";
            echo "<ul>";
            for ($i = 1; $i <= 10; $i++) {
                $result = $number * $i;
                echo "<li>$number × $i = $result</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>
