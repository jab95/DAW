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
    
    $hora = $_POST['hora'];
    $minutos = $_POST['minutos'];

    $minutosAMediaNocheEnSegundos = ((60- $minutos)*60);
    $horasAMediaNocheEnSegundos = ((24-($hora+1))*3600);

    print "Quedan exactamente ".($minutosAMediaNocheEnSegundos+$horasAMediaNocheEnSegundos)." segundos para media noche";

    ?>
</body>

</html>