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

        if(isset($_POST['numero'])){

            $suma = 0;
            $numero = $_POST['numero'];
            for ($i = $numero + 1; $i <= $numero + 100; $i++) {
              $suma += $i;
            }
              print $suma;
        }else{
    ?>

        <form action="ej17.php" method="post">
            Introduce un numero: <input type="number" min="0" name="numero" id="">
            <input type="submit" value="Calcular">
        </form>


    <?php
        }
    ?>
</body>
</html>