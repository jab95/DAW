<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php


    $i = 0;
      $lineal = [];
      do {
        $n = rand(0, 100);
        if (!in_array($n, $lineal)) {
          $lineal[] = $n;
          $i++;
        }
      } while ($i < 64);
     
      $i = 0;
      for ($x = 0; $x < 4; $x++) {
        for ($y = 0; $y <4; $y++) {
          $numero[$x][$y] = $lineal[$i];
          $i++;
        }
      }

    // Pinta el tablero de ajedrez
    echo '<table>';
    for ($fila = 0; $fila < 8; $fila++) {
      echo '<tr>';
      for ($columna = 0; $columna < 8; $columna++) {
        echo "<td>";

        echo $numero[$fila][$columna];

        echo "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";

    $contador1 = 1;
    $contadorFila1=0;
    $matrizB = null;


      for ($j=0; $contador1 < sizeof($numero[$j]) ; ) { 
        $matrizB[$j][$contador1] = $numero[$j][$contadorFila1];
        $contador1++;
        $contadorFila1++;
      }

      $contador1 = 0;
      $contadorFila1=1;
      for ($i=3; $contador1 < sizeof($numero[$i]) ; ) { 
        $matrizB[$contadorFila1][$i] = $numero[$contador1][$i];
        $contador1++;
        $contadorFila1++;
      }

      $contadorFila1=2;
      $contador1 = 3;
      for ($i=3; $contador1 >=0 ;) { 
        $matrizB[$i][$contadorFila1] = $numero[$i][$contador1];
        $contador1--;
        $contadorFila1--;
      }

      $contadorFila1=2;
      $contador1=3;
      for ($i=0; $contador1 >= 0 ; ) { 
        $matrizB[$contadorFila1][$i] = $numero[$contador1][$i];
        $contador1--;
        $contadorFila1--;
      }


    // Pinta el tablero de ajedrez
    echo '<table>';
    for ($fila = 0; $fila < 4; $fila++) {
      echo '<tr>';
      for ($columna = 0; $columna < 4; $columna++) {
        echo "<td>";

        echo $matrizB[$fila][$columna];

        echo "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";

    ?>

</table>
  
</body>
</html>