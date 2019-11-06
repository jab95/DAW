<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Enunciado: Muestra entre 7 y 20 frutas al azar (códigos ASCII & #127815; a & #127827;).
        Contar cuántas veces sale cada fruta y mostrar la información.</p>

    <?php

    $frutas = ["&#127815;", "&#127816;", "&#127817;", "&#127818;",  "&#127819;",  "&#127820;",  "&#127821;",  "&#127822;",  "&#127823;",  "&#127824;",  "&#127825;",  "&#127826;", "&#127827;" ];

    $frutasAMostrar = rand(7,20);


    for ($i=0; $i < $frutasAMostrar ; $i++) { 
        $frutaAMostrar = rand(0,count($frutas)-1);
        $frutasMostradas[] = $frutaAMostrar;
        print $frutas[$frutaAMostrar]." ";
    }

    print "<br><br><br>";

    for ($i=0; $i < sizeof($frutasMostradas) ; $i++) { 
        $contadorMostradas=0;
        foreach ($frutasMostradas as $key) {
            if($key == $frutasMostradas[$i]) $contadorMostradas++;
        }

        print "La fruta ". $frutas[$frutasMostradas[$i]]." aparece ".$contadorMostradas." veces<br>";
    }



    ?>


</body>

</html>