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

    if(isset($_POST['numero'])){

        $numero = $_POST['numero'];
        $numeros = $_POST['array'];
        $numeros .=$numero;

    }else{
        $numero=0;
        $numeros = "";
    }

    if(strlen($numeros)==10){

        $arrayNumeros = str_split($numeros);
        $min=$max=$arrayNumeros[0];
 
		foreach ($arrayNumeros as $valor) {

            if($min>$valor){
                $min=$valor;
            }
			if($max<$valor){
				$max=$valor;
            }
    }

    foreach ($arrayNumeros as $valor) {
        print $valor;
        if ($valor == $min) {
            print " es el numero mínimo";
        }
        if ($valor == $max) {
            print " es el numero máximo";
        }
        print "<br>";
      }

    }else{

     ?>

    <form action="ej2.php" method="post">

        Introduzca un numero: <input type="number" name="numero" id=""><br>
        <input type="hidden" name="array" value="<?= $numeros ?>">
        <input type="submit" value="Enviar">

    </form>

    <?php 
    }
    ?>
</body>

</html>