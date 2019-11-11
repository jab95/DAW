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

    if (!isset($_POST['numero'])) {
        $numero = 0;
        $total = 0;
        $contador = 0;
    } else {

        $total = $_POST['total'];
        $numero = $_POST['numero'];
        $total += $numero;
        $contador = $_POST['contador'];
    }



    if ($total <= 10000) {
        $contador++;

        ?>

        <form action="ej23.php" method="post">
            Introduce un numero: <input type="number" name="numero" id="">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="contador" value="<?= $contador ?>">
            <input type="hidden" name="numeros" value="<?= $numeros ?>">
            <input type="submit" value="Introducir otro numero">
        </form>

    <?php
    
    } else {
        print "La suma total es de " . $total . "<br>";
        print "Se han introducido " . $contador . " numeros <br>";
        $media = $total / $contador;
        print "La media es de " . $media;
    }
    ?>
</body>

</html>