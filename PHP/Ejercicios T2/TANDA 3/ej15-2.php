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
        
            $base = $_POST['base'];
            $exponenteIntroducido = $_POST['exponente'];
            for($i=1;$i<=$exponenteIntroducido;$i++){

                $total=1;
                $exponenteActual= $i;

                for($j=0;$j<$exponenteActual;$j++){
                    $total *= $base;
                }

                print $total."<br>";


            }

    ?>
        </body>
</html>