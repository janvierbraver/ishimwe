<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #2c3e50;
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
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #2980b9;
            color: white;
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f6390;
        }

        .result {
            margin-top: 20px;
            font-size: 20px;
            color: #27ae60;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Grade Calculator</h2>
    <form method="post">
        <label for="score">Enter Student's Score (0 - 100):</label>
        <input type="number" name="score" min="0" max="100" required>
        <input type="submit" value="Calculate Grade">
       <a href="./home.html" class="btn btn-primary btn-lg"> Go to Home page</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $score = (int)$_POST["score"];
        $grade = '';

        if ($score >= 90) {
            $grade = "A";
        } else {
            if ($score >= 80) {
                $grade = "B";
            } else {
                if ($score >= 70) {
                    $grade = "C";
                } else {
                    if ($score >= 60) {
                        $grade = "D";
                    } else {
                        $grade = "F";
                    }
                }
            }
        }

        echo "<div class='result'>Score: $score<br>Grade: <strong>$grade</strong></div>";
    }
    ?>
</div>

</body>
</html>
