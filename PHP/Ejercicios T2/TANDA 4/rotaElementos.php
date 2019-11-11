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

    if(strlen($numeros)==6){

        $arrayNumeros = str_split($numeros);
        $nuevoarray = array();
        $contador =0;
        for ($j=sizeof($arrayNumeros)-1; $j >=0; $j--) {
            $nuevoarray[$contador] = $arrayNumeros[$j];
            $contador++;
        }

        foreach ($nuevoarray as $key) {
            print $key."<br>";
        }

    }else{

     ?>

    <form action="rotaElementos.php" method="post">

        Introduzca un numero: <input type="number" name="numero" id=""><br>
        <input type="hidden" name="array" value="<?= $numeros ?>">
        <input type="submit" value="Enviar">

    </form>

    <?php 
    }
    ?>
</body>

</html>