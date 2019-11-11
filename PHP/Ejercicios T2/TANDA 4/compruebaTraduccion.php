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


            $diccionario = array('hola'=>'hello','adios'=>'bye','casa'=>'house','perro'=>'dog','gato'=>'cat','coche'=>'car');


            if(!isset($_POST['respuestas'])){

                $usados = array();
                $contadorPalabras1 = 0;
                $contadorPalabras2 = 0;
                $palabrasEnEspanol = array();

                //SE EXTRAEN LAS PALABRAS EN ESPAÑOL

                foreach ($diccionario as $key => $value) {
                    $palabrasEnEspanol[] = $key;
                }
                
                
                do {
                    $palabra = $palabrasEnEspanol[rand(0, 5)];
                    if (!in_array($palabra, $usados)) {
                    $usados[] = $palabra;
                    $contadorPalabras2++;
                    }
                } while ($contadorPalabras2 < 3);
                
                
            ?>

            <form action="compruebaTraduccion.php" method="post">
        
                <?php
                    for ($i=0; $i <sizeof($usados) ; $i++) { 
                        ?>
                        Introduzca la traduccion para <?= $usados[$i]?>
                        <input type="hidden" name="usados[<?= $i?>]" value="<?= $usados[$i]?>"> 
                        <input type="text" name="respuestas[<?=$i?>]" ><br><br>

                <?php
                    }
                ?>
                <input type="submit" value="Comprobar">
            </form>
        
            <?php

            }else{

                $usados = $_POST['usados'];
                $respuestasIngles = $_POST['respuestas'];

                for ($i=0; $i <sizeof($usados) ; $i++) { 
                    if($diccionario[$usados[$i]]==$respuestasIngles[$i]){
                        print "Acertada la traduccion de  ".$usados[$i]."<br>";
                    }else{
                        print "fallada la traduccion de ".$usados[$i]."<br>";
                    }
                }

            }
?>




</body>

</html>