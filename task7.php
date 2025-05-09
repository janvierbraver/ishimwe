<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: skyblue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .task {
            display: none;
            margin-top: 20px;
        }
        input, select {
            margin: 10px 0;
            padding: 8px;
            width: 80%;
        }
    </style>
    <script>
        function showTask(id) {
            var tasks = document.getElementsByClassName('task');
            for (var i = 0; i < tasks.length; i++) {
                tasks[i].style.display = 'none';
            }
            document.getElementById(id).style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Switch Case Tasks on single page</h1>
        <button onclick="showTask('calculator')">Simple Calculator</button>
        <button onclick="showTask('dayOfWeek')">Day of the Week</button>
        <button onclick="showTask('vowelCheck')">Vowel or Consonant</button>
        <button onclick="showTask('electricity')">Electricity Bill</button>

        <div id="calculator" class="task">
            <h2>Simple Calculator</h2>
            <form method="post">
                <input type="number" name="num1" placeholder="First Number" required>
                <input type="number" name="num2" placeholder="Second Number" required>
                <select name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select><br>
                <input type="submit" name="calc" value="Calculate">
            </form>
        </div>

        <div id="dayOfWeek" class="task">
            <h2>Day of the Week</h2>
            <form method="post">
                <input type="number" name="day" min="1" max="7" required>
                <input type="submit" name="daycheck" value="Check Day">
            </form>
        </div>

        <div id="vowelCheck" class="task">
            <h2>Vowel or Consonant</h2>
            <form method="post">
                <input type="text" name="char" maxlength="1" required>
                <input type="submit" name="checkchar" value="Check">
            </form>
        </div>

        <div id="electricity" class="task">
            <h2>Electricity Bill</h2>
            <form method="post">
                <input type="number" name="units" min="0" required>
                <input type="submit" name="bill" value="Calculate Bill">
            </form>
        </div>

        <?php
        if (isset($_POST['calc'])) {
            $n1 = $_POST['num1'];
            $n2 = $_POST['num2'];
            $op = $_POST['operator'];
            switch ($op) {
                case '+': $result = $n1 + $n2; break;
                case '-': $result = $n1 - $n2; break;
                case '*': $result = $n1 * $n2; break;
                case '/': $result = $n2 != 0 ? $n1 / $n2 : 'Error: divide by zero'; break;
                default: $result = 'Invalid';
            }
            echo "<p>Result: $result</p>";
        }

        if (isset($_POST['daycheck'])) {
            $day = $_POST['day'];
            switch ($day) {
                case 1: $d = "Monday"; break;
                case 2: $d = "Tuesday"; break;
                case 3: $d = "Wednesday"; break;
                case 4: $d = "Thursday"; break;
                case 5: $d = "Friday"; break;
                case 6: $d = "Saturday"; break;
                case 7: $d = "Sunday"; break;
                default: $d = "Invalid";
            }
            echo "<p>Day: $d</p>";
        }

        if (isset($_POST['checkchar'])) {
            $ch = strtolower($_POST['char']);
            switch ($ch) {
                case 'a': case 'e': case 'i': case 'o': case 'u':
                    $msg = "$ch is a vowel";
                    break;
                default:
                    $msg = ctype_alpha($ch) ? "$ch is a consonant" : "Invalid character";
            }
            echo "<p>$msg</p>";
        }

        if (isset($_POST['bill'])) {
            $units = $_POST['units'];
            switch (true) {
                case ($units <= 100): $bill = $units * 5; break;
                case ($units <= 200): $bill = 100 * 5 + ($units - 100) * 8; break;
                default: $bill = 100 * 5 + 100 * 8 + ($units - 200) * 10;
            }
            echo "<p>Total Bill: RWF $bill</p>";
        }
        ?>
    </div>
</body>
</html>
