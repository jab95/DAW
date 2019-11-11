<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise9/tanda4</title>
</head>

<body>
    <h1>Inserte 10 números por teclado</h1>
    <?php
    if (!isset($_GET['n'])) {
        $contadorNumeros = 0;
        $numeroTexto = "";
        $n = "";
    } else {
        $n = $_GET['n'];
        $contadorNumeros = $_GET['contadorNumeros'];
        $numeroTexto = $_GET['numeroTexto'];
    }
    if ($contadorNumeros == 10) {
        $numeroTexto = $numeroTexto . " " . $n;
        $numeroTexto = substr($numeroTexto, 2);

        ?>
        <form action="rotarArrayTablas.php" method="get">
            Posición inicial: <input type="number" name="inicial" autofocus="" min="0" max="9" required=""><br>
            Posición final: <input type="number" name="final" min="0" max="9" required=""><br>
            <input type="hidden" name="contadorNumeros" value="13">
            <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
            <input type="hidden" name="n" value="basura">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    if ($contadorNumeros == 13) {
        $numero = explode(" ", $numeroTexto);
        $inicial = $_GET["inicial"];
        $final = $_GET["final"];

        $arrayNuevo = [];
        if ($numero[$inicial] > $numero[$final]) {
            echo "Lo que contiene la posición inicial debe ser menor que lo que contiene la posición final";
        } else if ($inicial < 0 || $inicial > 9 || $final < 0 || $final > 9) {
            echo "La posición inicial y final debe estar entre la 0 y la 9";
        } else {
            for ($i = 0; $i < sizeof($numero); $i++) {
                if ($i == sizeof($numero) - 1) {
                    $arrayNuevo[0] = $numero[$i];
                } else if ($i < $inicial) {
                    $arrayNuevo[$i + 1] = $numero[$i];
                } else if ($i == $inicial) {
                    $arrayNuevo[$final] = $numero[$i];
                } else if ($i >= $final) {
                    $arrayNuevo[$i + 1] = $numero[$i];
                } else if ($i > $inicial && $i < $final) {
                    $arrayNuevo[$i] = $numero[$i];
                }
            }

            echo "ARRAY INICIAL <br>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Índice</th>";
            echo "<th>Número</th>";
            echo "</tr>";
            for ($i = 0; $i < sizeof($numero); $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $numero[$i] . "</td>";
                echo "</tr>";
            }
            echo "</table>";


            echo "ARRAY FINAL <br>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Índice</th>";
            echo "<th>Número</th>";
            echo "</tr>";
            for ($i = 0; $i < sizeof($arrayNuevo); $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $arrayNuevo[$i] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        ?>
        <br>
        <a href="exercise9_t4.php">Volver</a>
    <?php
    }
    if ($contadorNumeros < 10) {
        ?>
        <form action="rotarArrayTablas.php" method="get">
            Introduzca un número:
            <input type="number" name="n" autofocus> <br>
            <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
            <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $n ?>">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>
</body>

</html>