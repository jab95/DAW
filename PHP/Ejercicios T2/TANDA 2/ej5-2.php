<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    El resultado de la ecuacion de primer grado es 

    <?php 
        $a = $_POST['a'];
        $b = $_POST['b'];
    
        $resultado = -$b/$a;

        print $resultado;
    ?>
</body>
</html>