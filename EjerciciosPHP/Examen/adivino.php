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
            $numero = $_POST['numero'];
            $numeroAAdivinar = $_POST['numeroAAdivinar'];

        }else{
                $numeroAAdivinar = rand(1,6);
                $numero="";
        }

        if($numero==$numeroAAdivinar) {
            print "FELICIDADES HAS ACERTADO EL NUMERO!!!<br>";
            print '<a href="adivino.php">Volver a jugar</a>';

        }else{
            if ($numero==" " && isset($_POST['numero'])) {
                print "No ha escrito ningún número";
            } elseif( !is_numeric($numero) && isset($_POST['numero'])) {
                print "El numero debe de ser entero";
            }elseif ($numero < $numeroAAdivinar && isset($_POST['numero'])) {
                print "Demasiado pequeño";
            } elseif ($numero > $numeroAAdivinar && isset($_POST['numero'])) {
                print "Demasiado grande";
            }
        }

    ?>
   
    <form action="adivino.php" method="post">
        Introduce un numero: <input type="text" name="numero" id="">
        <input type="hidden" name="numeroAAdivinar" value="<?= $numeroAAdivinar ?>">
        <input type="hidden" name="acertado" value="<?= $acertado ?>">
        <input type="submit" value="Comprobar numero">
    </form>

   

</body>
</html>