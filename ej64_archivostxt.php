<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 64</title>
</head>
<body>

<h2>Captura de datos de alumnos</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Edad: <input type="number" name="edad" required><br><br>
    Pasatiempo: <input type="text" name="pasatiempo" required><br><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $pasatiempo = $_POST["pasatiempo"];

    file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
    file_put_contents("edades.txt", $edad . PHP_EOL, FILE_APPEND);
    file_put_contents("pasatiempos.txt", $pasatiempo . PHP_EOL, FILE_APPEND);

    echo "<p>Datos guardados correctamente.</p>";
}
?>

<hr>

<h3>Eliminar información</h3>
<form method="POST">
    <input type="submit" name="eliminar" value="Eliminar toda la información">
</form>

<?php
if (isset($_POST["eliminar"])) {
    file_put_contents("alumnos.txt", "");
    file_put_contents("edades.txt", "");
    file_put_contents("pasatiempos.txt", "");
    echo "<p>Se eliminó toda la información.</p>";
}
?>
</body>
</html>