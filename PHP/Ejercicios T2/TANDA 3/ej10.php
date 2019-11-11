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

    if (!isset($_POST['numeroIntroducido'])) {
        $numeroIntroducido = 1;
        $contadorMedia=0;
        $total=0;
      } else {
        
        $numeroIntroducido = $_POST['numeroIntroducido'];
        $total = $_POST['total'];
        $contadorMedia = $_POST['contadorMedia'];

        if ($numeroIntroducido < 0) 
            print "La media de los numeros introducidos es ".($total/$contadorMedia);
        else{
            $contadorMedia++;
            $total=intval($total)+intval($numeroIntroducido);
        }
    }

      if ($numeroIntroducido > 0) {

        echo "Introduce un número positivo";
        echo '<form action="ej10.php" method="post">';
        echo '<input type="number" name="numeroIntroducido" autofocus>';
        echo '<input type="hidden" name="total" value="',  $total, '">';
        echo '<input type="hidden" name="contadorMedia" value="', $contadorMedia, '">';
        echo '<input type="submit" value="Continuar">';
        echo '</form>';
      }

    ?>

</body>

</html>