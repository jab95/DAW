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
            if (isset($_POST['numero'])) {

                $numero = $_POST['numero'];
                $contadorMultiplos3=0;
                $totalSuma=0;

                print "Los multiplos de 3 entre 1 y ".$numero." son ";

                for ($i=1; $i <= $numero ; $i++) { 
                    if($i%3==0){
                        $contadorMultiplos3++;
                        $totalSuma+=$i;
                        print $i." ";
                    }
                }

                print "<br>Hay en total ".$contadorMultiplos3." multiplos de 3";
                print "<br>El total de la suma de todos los multiplso es de: ".$totalSuma;

            }else{
    ?>
            <form action="ej27.php" method="post">

                Indica un numero: <input type="number" name="numero" id=""><br>
                <input type="submit" value="Enviar">

            </form>
    <?php
            }
    ?>
</body>
</html>