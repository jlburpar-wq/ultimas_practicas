<?php
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $pasatiempo = $_POST['pasatiempo'];

    // Guarda cada dato en su archivo, uno por línea
    file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
    file_put_contents("edades.txt", $edad . PHP_EOL, FILE_APPEND);
    file_put_contents("pasatiempos.txt", $pasatiempo . PHP_EOL, FILE_APPEND);

    echo "<p style='color:green'>Datos guardados correctamente</p>";
}

if (isset($_POST['eliminar_todo'])) {
    file_put_contents("alumnos.txt", "");
    file_put_contents("edades.txt", "");
    file_put_contents("pasatiempos.txt", "");
    echo "<p style='color:red'>Se eliminó toda la información de los archivos</p>";
}

if (isset($_POST['eliminar_uno'])) {
    $buscar = $_POST['buscar'];

    $alumnos = file_exists("alumnos.txt") ? file("alumnos.txt", FILE_IGNORE_NEW_LINES) : [];
    $edades = file_exists("edades.txt") ? file("edades.txt", FILE_IGNORE_NEW_LINES) : [];
    $pasatiempos = file_exists("pasatiempos.txt") ? file("pasatiempos.txt", FILE_IGNORE_NEW_LINES) : [];

    $nuevos_alumnos = [];
    $nuevas_edades = [];
    $nuevos_pasatiempos = [];

    for ($i = 0; $i < count($alumnos); $i++) {
        if (trim($alumnos[$i]) != trim($buscar)) {
            $nuevos_alumnos[] = $alumnos[$i];
            $nuevas_edades[] = $edades[$i];
            $nuevos_pasatiempos[] = $pasatiempos[$i];
        }
    }

    file_put_contents("alumnos.txt", implode(PHP_EOL, $nuevos_alumnos) . (count($nuevos_alumnos) > 0 ? PHP_EOL : ""));
    file_put_contents("edades.txt", implode(PHP_EOL, $nuevas_edades) . (count($nuevas_edades) > 0 ? PHP_EOL : ""));
    file_put_contents("pasatiempos.txt", implode(PHP_EOL, $nuevos_pasatiempos) . (count($nuevos_pasatiempos) > 0 ? PHP_EOL : ""));

    echo "<p style='color:red'>Se eliminó a: $buscar</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 65 - Archivos TXT</title>
</head>
<body>
    <h2>Captura de datos de alumnos</h2>

    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br><br>
        Edad: <input type="number" name="edad" required><br><br>
        Pasatiempo: <input type="text" name="pasatiempo" required><br><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>

    <hr>

    <h3>Eliminar información</h3>

    <form method="POST">
        Nombre a eliminar: <input type="text" name="buscar" required>
        <input type="submit" name="eliminar_uno" value="Eliminar alumno">
    </form>
    <br>

    <form method="POST">
        <input type="submit" name="eliminar_todo" value="Eliminar TODA la información">
    </form>

    <hr>

    <h3>Datos guardados:</h3>
    <p><b>Alumnos:</b><br><?php echo file_exists("alumnos.txt") ? nl2br(file_get_contents("alumnos.txt")) : ""; ?></p>
    <p><b>Edades:</b><br><?php echo file_exists("edades.txt") ? nl2br(file_get_contents("edades.txt")) : ""; ?></p>
    <p><b>Pasatiempos:</b><br><?php echo file_exists("pasatiempos.txt") ? nl2br(file_get_contents("pasatiempos.txt")) : ""; ?></p>

</body>
</html>