
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

    $resultado = $_POST['pregunta1']+$_POST['pregunta2']+$_POST['pregunta3']+$_POST['pregunta4']
    +$_POST['pregunta5']+$_POST['pregunta6']+$_POST['pregunta7']+$_POST['pregunta8']
    +$_POST['pregunta9']+$_POST['pregunta10'];

    print "Has sacado ".$resultado." puntos";

?>
    
</body>
</html>