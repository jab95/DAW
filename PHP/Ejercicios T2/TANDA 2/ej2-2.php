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
        $resultado ="";
        switch ($hora) {
            case 21:
            case  22:
            case  23:
            case  00:
            case  1:
            case  2:
            case  3:
            case  4:
            case  5:          
                $resultado = "Hola buenas noches";
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
                 $resultado = "Hola buenos dias";
             break;
            case 13:
            case 14:
            case 15:
            case 16:
            case 17:
            case 18:
            case 19:
            case 20:
                 $resultado ="Hola buenas tardes";
                 break;
            default:
                $resultado ="La hora introducida no es la correcta, prueba de nuevo";
                break;
        }

        print $resultado;
    
    ?>
    <br>
    <a href="ej2.php">Vuelva a introducir la hora</a>
</body>

</html>