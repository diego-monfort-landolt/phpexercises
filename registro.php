<?php
session_start();
$primeravez = FALSE;
if (empty($_POST["botEnviar"])) {
    $primeravez = TRUE;
    $_POST["nombre"] = "";
    $_POST["apellidos"] = "";
    $_POST["fechanacimiento"] = "";
    $_POST["direcion"] = "";
    $_POST["poblacion"] = "";
    $_POST["codpostal"] = "";
    $_POST["email"] = "";
    $_POST["telefono"] = "";

}

if (!$primeravez) {
    $valido = TRUE;
    if (empty($_POST["nombre"])) {
        echo "<p class='error'>Falta rellenar el campo <b>Nombre!</b></p>";
        $valido = FALSE;
    }

    if (empty($_POST["apellidos"])) {
        echo "<p class='error'>Falta rellenar el campo <b>apellidos!</b></p>";
        $valido = FALSE;
    }

    if (empty($_POST["E-Mail"])) {
        echo "<p class='error'>Falta rellenar el campo <b>E-Mail!</b></p>";
        $valido = FALSE;
    } elseif (!preg_match("/^[a-zA-ZO-9_\-\.]+$/", $_POST["email"])) {
        echo "<p class='error'> <b>E-Mail!</b> no valido!</p>";
        $valido = FALSE;
    }

    if (empty($_POST["Contraseña"])) {
        echo "<p class='error'>Falta rellenar el campo <b>Contraseña!</b></p>";
        $valido = FALSE;
    }

    if ($valido) {
        $nombre = session_id() . ".txt";
        $file   = "usuarios/$nombre";
        $fd     = fopen($file, "w+");
        foreach ($_POST as $valor) {
            $linea = "$valor\n";
            fwrite($fd, $linea);
            $linea = "";
        }
        fclose($fs);
        header("Location: http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/confirmar.php?archivo=$nombre");
    }
}
?>