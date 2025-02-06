<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $operation = $_POST['operation'] ?? 'add';
    $result = '';
    
    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            $result = ($num2 != 0) ? $num1 / $num2 : 'Error: Division by zero';
            break;
        case 'exponentiate':
            $result = pow($num1, $num2);
            break;
        case 'percentage':
            $result = ($num1 / 100) * $num2;
            break;
        case 'sqrt':
            $result = sqrt($num1);
            break;
        case 'log':
            $result = ($num1 > 0) ? log($num1) : 'Error: Logarithm undefined';
            break;
        default:
            $result = 'Invalid operation';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h2>Multipurpose Calculator</h2>
    <form method="post">
        <label>Number 1:</label>
        <input type="number" name="num1" step="any" required><br>
        
        <label>Number 2:</label>
        <input type="number" name="num2" step="any"><br>
        
        <label>Operation:</label>
        <select name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponentiate">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root (Only Number 1)</option>
            <option value="log">Logarithm (Only Number 1)</option>
        </select><br>
        
        <button type="submit">Calculate</button>
    </form>
    
    <?php if (isset($result)) : ?>
        <h3>Result: <?php echo $result; ?></h3>
    <?php endif; ?>
</body>
</html>
