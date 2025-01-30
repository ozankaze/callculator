<?php

// $a = $_POST["num1"];
// $b = $_POST["num2"];

$result = ' ';

if (isset($_POST["jumlah"])) {
    
    $num1 = htmlspecialchars($_POST["num1"]);
    $num2 = htmlspecialchars($_POST["num2"]);
    $operator = $_POST["operator"];

    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operator) {
            case "tambah":
                $result = $num1 + $num2;
            break;

            case "kurang":
                $result = $num1 - $num2;
            break;

            case "kali":
                $result = $num1 * $num2;
            break;

            case "bagi":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "tidak bisa di bagi dengan 0";
                }
            break;
        }
    } else {
        echo "masukan angka";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>

    <form action="index.php" method="post">

        <input type="text" name="num1" id="" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : '' ?>">

        <input type="text" name="num2" id="" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : '' ?>">

        <select name="operator" id="">
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'tambah' ? 'selected' : "" ?> value="tambah">tambah</option>
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'kurang' ? 'selected' : "" ?> value="kurang">kurang</option>
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'kali' ? 'selected' : "" ?> value="kali">kali</option>
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'bagi' ? 'selected' : "" ?> value="bagi">bagi</option>
        </select>

        <button type="submit" name="jumlah">calculate</button>

    </form>

    <br>
    
    <?php echo $result ?>

</body>
</html>