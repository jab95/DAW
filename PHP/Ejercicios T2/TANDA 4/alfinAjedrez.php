<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style type="text/css">
    table,
    th,
    td {
        border: 0px;
        text-align: center;
    }

    td.negro {
        background-color: black;
    }

    td.blanco {
        background-color: white;
    }

    tr.marron {
        background-color: brown;
    }
</style>

<h2> Movimiento de un alfil</h2>
<?php
    // Recoge la posición del alfil
    if(isset($_POST['posicion'])){
    $posicion = $_POST['posicion'];
    $x = ord(substr($posicion, 0, 1)) - ord('a');
    $y = 8 - substr($posicion, 1, 1);

    // Pinta el tablero de ajedrez
    $color = "blanco"; // color de la primera casilla
    echo '<table><tr class="marron">';
    echo '<td></td><td>a</td><td>b</td><td>c</td><td>d</td><td>e</td><td>f</td><td>g</td><td>h</td><td></td></tr>';
    for ($fila = 0; $fila < 8; $fila++) {
      echo '<tr><td style="text-align: right; background-color: brown;">'.(8 - $fila).'</td>';
      for ($columna = 0; $columna < 8; $columna++) {
        echo "<td class=\"$color\">";

        // Comprueba si el alfil está en la posición actual
        if (($x == $columna) && ($y == $fila)) {
          echo '<p style=" background-color: brown;"> A </p>';
        // Comprueba si es una posición a la que puede llegar el alfil
        } else if (abs((abs($x) - abs($columna))) == abs((abs($y) - abs($fila)))) {
          echo '<p style=" background-color: green;"> A </p>';
        } else {
          echo '<p> - </p>';
        }
        echo "</td>";

        // Alterna el color de la casilla
        if ($color == "blanco") {
          $color = "negro";
        } else {
          $color = "blanco";
        }
        echo "</td>";
      }
      if ($color == "blanco") {
        $color = "negro";
      } else {
        $color = "blanco";
      }
      echo '<td style="text-align: left; background-color: brown;">'.(8 - $fila).'</td></tr>';
    }
    ?>
<tr class="marron">
    <td></td>
    <td>a</td>
    <td>b</td>
    <td>c</td>
    <td>d</td>
    <td>e</td>
    <td>f</td>
    <td>g</td>
    <td>h</td>
    <td></td>
</tr>
</table>
<?php
    }else{


        ?>
<br>
Introduzca las coordenadas del alfil (p. ej. e4)
<br>
<form action="alfinAjedrez.php" method="post">
    <input type="text" name="posicion" autofocus="" required=""><br>
    <input type="submit" value="Aceptar">
</form>
<?php
    }
?>

</html>