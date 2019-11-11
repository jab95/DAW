<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DisFruta con PHP</title>
</head>
<body>
  
    <?php

    print '<h1 style="text-align: center">DisFruta con PHP </h1>';

    $frutas = ["&#127815;", "&#127816;", "&#127817;", "&#127818;",  "&#127819;",  "&#127820;",  "&#127821;",  "&#127822;",  "&#127823;",  "&#127824;",  "&#127825;",  "&#127826;", "&#127827;" ];

    $frutasAMostrar = rand(7,20);
    $cadenaMostrada="";

    print '<p style="font-size: 7rem">';
    for($i = 0; $i < $frutasAMostrar; $i++){
        $frutaAMostrar = rand(0,count($frutas)-1);
        $frutasMostradas[] = $frutaAMostrar;
        print $frutas[$frutaAMostrar];
    }
    print "</p>";
    print "<h2>". sizeof($frutasMostradas). " frutas</h2>";
    print  "<br/>";

    for ($i=0; $i < sizeof($frutasMostradas) ; $i++) { 
        $contadorMostradas=0;
        foreach ($frutasMostradas as $key) {
            if($key == $frutasMostradas[$i]) $contadorMostradas++;
        }

        if(strpos($cadenaMostrada, $frutas[$frutasMostradas[$i]]) == false){
            if($contadorMostradas>1)
                $cadenaMostrada.= '<p>La fruta<span style="font-size: 2rem">'. $frutas[$frutasMostradas[$i]]." </span> está <strong>".$contadorMostradas." </strong> veces en la lista</p><br>";
            else
             $cadenaMostrada.= '<p>La fruta <span style="font-size: 2rem"> '. $frutas[$frutasMostradas[$i]]." </span> está <strong>".$contadorMostradas." </strong> vez</p><br>";
        }
        
    }
    print $cadenaMostrada;

    print '<button onclick="location.reload()">Disfruta otra vez</button>';

    ?>

</body>
</html>

