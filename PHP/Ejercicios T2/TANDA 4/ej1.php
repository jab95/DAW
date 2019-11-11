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
    
        $numero = array();
        $cuadrado = array();
        $cubo = array();

        for ($i=0; $i <20 ; $i++) { 
            $valorArray = rand(1,100);
            $numero[$i] = $valorArray;
            $cuadrado[$i] = pow($valorArray,2);
            $cubo[$i] = pow($valorArray,3);
        }

        for ($i=0; $i <sizeof($numero) ; $i++) { 

               print $numero[$i]."    -    ".$cuadrado[$i]."     -      ".$cubo[$i]."<br>";
            
        }



        
    
    ?>


</body>

</html>