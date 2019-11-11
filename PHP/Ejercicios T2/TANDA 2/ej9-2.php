<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
El resultado de la ecuacion de segundo grado es 

<?php 
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    $resultado = (pow($b,2)-(4*$a*$c));

    print $resultado;
?>
</body>
</html>