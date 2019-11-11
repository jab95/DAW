<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    El dia indicado es
    <?php 

$dia = $_POST['numero'];
$resultado = "";

switch ($dia) {
    case 1:
    $resultado = " lunes";
        break;
    case 1:
        $resultado = " martes";
        break;  
    case 3:
        $resultado = " miercoles";
        break;
    case 4:
        $resultado = " jueves";
        break;
    case 5:
        $resultado = " viernes";
        break;
    case 6:
        $resultado = " sabado";
        break;
    case 7:
        $resultado = " domingo";
        break;
    
}

print $resultado;


?>

</body>

</html>