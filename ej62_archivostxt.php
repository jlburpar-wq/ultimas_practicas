<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 62 - Tema Libre</title>
</head>
<body>

<h2>videojuegos</h2>

<form method="POST">
    Videojuego: <input type="text" name="juego" required><br><br>
    Plataforma: 
    <select name="plataforma">
        <option>PlayStation</option>
        <option>Xbox</option>
        <option>PC</option>
        <option>Nintendo</option>
        <option>Celular</option>
    </select><br><br>
    Calificación (1-10): <input type="number" name="calif" min="1" max="10" required><br><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST["guardar"])) {
    $juego = $_POST["juego"];
    $plataforma = $_POST["plataforma"];
    $calif = $_POST["calif"];

    $dato = $juego . " - " . $plataforma . " - Calificación: " . $calif . "/10";

    file_put_contents("videojuegos.txt", $dato . PHP_EOL, FILE_APPEND);

    echo "<p>Juego guardado correctamente.</p>";

    if ($calif >= 9) {
        echo "<p>¡Ese es de tus favoritos!</p>";
    } elseif ($calif >= 7) {
        echo "<p>Está bueno, sí vale la pena jugarlo.</p>";
    } else {
        echo "<p>Ese no estuvo tan chido.</p>";
    }
}
?>

<hr>

<h3>Eliminar lista</h3>
<form method="POST">
    <input type="submit" name="eliminar" value="Eliminar toda la lista">
</form>

<?php
if (isset($_POST["eliminar"])) {
    file_put_contents("videojuegos.txt", "");
    echo "<p>Se eliminó toda la lista.</p>";
}
?>

<hr>

<h3>Lista guardada:</h3>
<?php
if (file_exists("videojuegos.txt")) {
    $contenido = file_get_contents("videojuegos.txt");
    echo nl2br($contenido);
} else {
    echo "No hay juegos registrados.";
}
?>

</body>
</html>