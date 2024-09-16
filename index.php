<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculator {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .calculator h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        .calculator label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .calculator input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .calculator input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculator input[type="submit"]:hover {
            background-color: #218838;
        }

        .calculator p {
            font-size: 18px;
            color: #333;
            text-align: center;
        }

        .error {
            color: #e74c3c;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="calculator">
        <h2>Simple Calculator</h2>

        <?php
        function getNumber($inputName) {
            return isset($_GET[$inputName]) ? (float)$_GET[$inputName] : 0;
        }

        function getOperation() {
            return isset($_GET['operation']) ? $_GET['operation'] : '';
        }

        function calculate($num1, $num2, $operation) {
            switch ($operation) {
                case '+':
                    return $num1 + $num2;
                case '-':
                    return $num1 - $num2;
                case '*':
                    return $num1 * $num2;
                case '/':
                    if ($num2 != 0) {
                        return $num1 / $num2;
                    } else {
                        return "Error: Division by zero!";
                    }
                default:
                    return "Invalid operation!";
            }
        }

        if (isset($_GET['getal1']) && isset($_GET['operation']) && isset($_GET['getal2'])) {
            $num1 = getNumber('getal1');
            $operation = getOperation();
            $num2 = getNumber('getal2');
            
            $result = calculate($num1, $num2, $operation);

            echo "<p>" . (is_numeric($result) ? "Antwoord: $result" : "<span class='error'>$result</span>") . "</p>";
        }
        ?>

        <form action="index.php" method="GET">
            <label for="getal1">Eerste getal:</label>
            <input type="text" id="getal1" name="getal1" required>

            <label for="operation">Operation:</label>
            <input type="text" id="operation" name="operation" required>

            <label for="getal2">Tweede Getal:</label>
            <input type="text" id="getal2" name="getal2" required>

            <input type="submit" value="Bereken">
        </form>
    </div>

</body>
</html>
