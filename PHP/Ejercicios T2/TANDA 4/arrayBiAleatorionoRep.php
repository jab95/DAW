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


  // Genera un array con números aleatorios que no se repiten
      // Primero se meten en un array lineal (todos seguidos)...
      $i = 0;
      $lineal = [];
      do {
        $n = rand(100, 999);
        if (!in_array($n, $lineal)) {
          $lineal[] = $n;
          $i++;
        }
      } while ($i < 54);
      // ...y después se vuelca en un array de 9x6
      // al mismo tiempo que se calculan las coordenadas
      // del mínimo
      $minimo = 999;
      $i = 0;
      for ($x = 0; $x < 9; $x++) {
        for ($y = 0; $y < 6; $y++) {
          $numero[$x][$y] = $lineal[$i];
          $i++;
          if ($numero[$x][$y] < $minimo) {
            $minimo = $numero[$x][$y];
            $xMinimo = $x;
            $yMinimo = $y;
          }
        }
      }

      // Se muestra el array con el mínimo en azul y sus
      // diagonales en verde
      // Nota: abs($x) devuelve el valor absoluto de $x
      echo "<table>";
      for ($x = 0; $x < 9; $x++) {
        echo "<tr>";
        for ($y = 0; $y < 6; $y++) {
          if ($numero[$x][$y] == $minimo) {
            echo '<td><span style="color: blue; font-weight:bold">'.$numero[$x][$y].' </span></td>';
          } else if (abs((abs($x) - abs($xMinimo))) == abs((abs($y) - abs($yMinimo)))) {
            echo '<td><span style="color: green; font-weight:bold">'.$numero[$x][$y].' </span></td>';
          } else {
            echo '<td>'.$numero[$x][$y].'</td>';
          }
        }
        echo "</tr>";
      }
      echo "</table>";




    // $repe=true;
    // $usados = array();
    // $arrayBi[6][9] = null;
    // $arrayFilas = array();
    // $minimos = array();
    // $numeroMinimo=0;


    //         for ($i=0; $i <6 ; $i++) { 
    //             for ($j=0; $j <9 ; $j++) { 
    //                 $arrayBi[$i][$j] = aleatorio();
    //             }
    //         }

            
    //         for ($i=0; $i <6 ; $i++) { 
    //             for ($j=0; $j <9 ; $j++) { 
    //                 $arrayFilas[]  = $arrayBi[$i][$j] ;
    //             }

    //             $minimos[] = min($arrayFilas);
    //         }

    //         $numeroMinimo = min($minimos);

    //         for ($i=0; $i <sizeof($arrayBi) ; $i++) { 
    //             for ($j=0; $j <sizeof($arrayBi[$i]) ; $j++) { 
                    
    //                 while($contadorColumnas< sizeof($arrayBi)){
    //                     $digito = $arrayBi[$contadorFilas][$contadorColumnas];
    //                     $contadorColumnas++;
    //                     $contadorFilas++;
    //                     $arrayDiagonalString.= $digito;

    //                     if($digito==) print '<font color="red">'.$key.'</font><br>';
    //                     else print '<font color="green">'.$key.'</font><br>';

                    
    //                 }
    //                 print $arrayBi[$i][$j]." ";
    //             }
    //             print "<br>";
    //         }





    //         $contadorColumnas=$columna;
    //         $contadorFilas=$fila;
            
    //         while($contadorColumnas>0){
    //             $digito = $array[--$contadorFilas][--$contadorColumnas];
    //             $contadorColumnas--;
    //             $contadorFilas--;
    //             $arrayDiagonalString = $digito.$arrayDiagonalString;
               
    //         }



    //         // if(intval($key)%2==0) print '<font color="red">'.$key.'</font><br>';
    //         // else print '<font color="green">'.$key.'</font><br>';




       
       
       
       
       
       
    //         function aleatorio(){
    //         global $repe;
    //         global $usados;
    //         $num = 0;
    //         $numerosDados=0;

    //         if (sizeof($usados)!= 54) {
    //         while ($repe != false) {
    //             $num = rand(0,60);
    //             $repe = repetido($num);
    //             if ($numerosDados == 54) 
    //             $repe = false;
                
    //         }
    //         $numerosDados++;
        
    //         $usados[] = $num;
    //         $repe=true;
    //         return $num;
    //         } else 
    //         return null;
            
    //     }
        
    //     function repetido($num) {
    //         $repe = false;
    //         global $usados;
            
    //         for ($i = 0; $i < sizeof($usados); $i++) {
    //         if ($num == $usados[$i]) {
    //             $repe = true;
    //             break;
    //         }
            
    //         }
    //         return $repe;
    //     }




?>

</body>

</html>