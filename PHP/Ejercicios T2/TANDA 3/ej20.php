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

    if (isset($_POST['altura'])) {

        $alturaIndicada = $_POST['altura'];
        $formato = $_POST['relleno'];
        $cuadradosAPintar = 1;
        $espacios = $alturaIndicada ;

        for ($i = 0; $i < $alturaIndicada; $i++) {

            for ($j = 0; $j < $espacios; $j++) {
                print "&nbsp";
            }
            $espacios--;

            for ($cuad = 0; $cuad < $cuadradosAPintar; $cuad++) {
                if($i==0 || $i==($alturaIndicada-1))
                    print $formato;
                else{
                    
                    if($cuad==0 || $cuad==($cuadradosAPintar-1))
                     print "*";
                    else print "&nbsp&nbsp";
                }
            }
            $cuadradosAPintar += 2;

            print "<br>";
        }
    } else {

        ?>

        <form action="ej20.php" method="post">
            Introduzca una altura: <input type="number" name="altura" id=""> <br>
            Que relleno quiere que sea: <br>
            <input type="radio" name="relleno" value="*" checked id=""> *
            <input type="radio" name="relleno" value="-" id=""> -
            <input type="radio" name="relleno" value="º" id=""> º
            <input type="radio" name="relleno" value="ª" id=""> ª
            <input type="radio" name="relleno" value="A" id=""> A
            <br>
            <input type="submit" value="Mostrar triangulo">
        </form>
    <?php
    }
    ?>


</body>

</html>