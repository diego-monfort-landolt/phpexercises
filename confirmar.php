<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar</title>
</head>
<body>
    <?php
    if (isset($_GET["archivo"])) {
        $fc = fopen("usuarios/" . $_GET["archivos"], "r");
        echo "<table>";
        echo "<tr>";
        while (!feof($fd)) {
            $fline = fgets($fd);
            $fline = htmlspecialchars($fline);
            echo "<td>$fline</td></tr>";

        }
        echo "</table>";
        fclose($fd);
    }

    ?>
    
</body>
</html>