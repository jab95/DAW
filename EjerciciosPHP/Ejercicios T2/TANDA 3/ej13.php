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

    if (!isset($_POST['numeroIntroducido'])) {
        $numeroIntroducido = 1;
        $contadorNumeros=0;
        $contadorPositivos=0;
        $contadorNegativos=0;
      } else {
        
        $numeroIntroducido = $_POST['numeroIntroducido'];
        $contadorPositivos= $_POST['contadorPositivos'];
        $contadorNegativos= $_POST['contadorNegativos'];
        
        if($numeroIntroducido<0) $contadorNegativos++;
        else $contadorPositivos++;

        $contadorNumeros = $_POST['contadorNumeros'];
        $contadorNumeros++;

        if ($contadorNumeros == 10){

            print "Hay ".$contadorNegativos." numeros negativos y ".$contadorPositivos.
            " numeros positivos.";
            
        }
      
    }

      if ($contadorNumeros < 10) {

        echo "Introduce un número positivo";
        echo '<form action="ej13.php" method="post">';
        echo '<input type="number" name="numeroIntroducido" autofocus>';
        echo '<input type="hidden" name="contadorNumeros" value="', $contadorNumeros, '">';
        echo '<input type="hidden" name="contadorPositivos" value="', $contadorPositivos, '">';
        echo '<input type="hidden" name="contadorNegativos" value="', $contadorNegativos, '">';
        echo '<input type="submit" value="Continuar">';
        echo '</form>';
      }

    ?>



</body>
</html>