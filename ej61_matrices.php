<?php
// Eje1_Matrices.php

$matrizA = [];
$matrizB = [];
$matrizC = [];

$valorA = 100; // de 10 en 10
$valorB = 500; // de 20 en 20

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $matrizA[$i][$j] = $valorA;
        $matrizB[$i][$j] = $valorB;
        $matrizC[$i][$j] = $matrizA[$i][$j] + $matrizB[$i][$j];

        $valorA += 10;
        $valorB += 20;
    }
}

function mostrarMatriz($matriz, $titulo) {
    echo "<h3>$titulo</h3>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eje1 Matrices</title>



    
</head>
<body>
    <div style="display:flex; gap:30px;">
        <?php
        mostrarMatriz($matrizA, "MatrizA");
        mostrarMatriz($matrizB, "MatrizB");
        mostrarMatriz($matrizC, "MatrizC");
        ?>
    </div>
</body>
</html>