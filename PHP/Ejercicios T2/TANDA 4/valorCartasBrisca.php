<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EJ 10</title>
</head>

<body>


    <?php

            $puntos = array('AS'=>11,'2'=>0,'3'=>10,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'sota'=>2,'caballo'=>3,'rey'=>4);
            $palos = array('ORO','COPA','BASTO','ESPADA');
            $cartas = array('AS','2','3','4','5','6','7','sota','caballo','rey');
            $contadorCartas=0;
            $cartasUsadas = array();
            $puntosTotales = 0;

            while($contadorCartas<=10){

                $paloSacado = rand(0,3);
                $valorSacado = rand(0,9);

                $cartaSacada = $cartas[$valorSacado]." de ".$palos[$paloSacado];

                if(!in_array($cartaSacada,$cartasUsadas)){

                    $cartasUsadas[] = $cartaSacada;
                    $puntosTotales +=$puntos[$cartas[$valorSacado]];

                }

                $contadorCartas++;
            }

            foreach ($cartasUsadas as $key) {
                print $key." <br>";
            }

            print "En total has sacado ".$puntosTotales." puntos";

    ?>

</body>

</html>