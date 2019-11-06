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
          if (!isset($_POST['numero1'])){
            ?>
    Por favor, introduzca dos números enteros que no sean iguales.<br>
    <form action="ej18.php" method="post">
        <input type="number" name="numero1" autofocus=""><br>
        <input type="number" name="numero2"><br>
        <input type="submit" value="Aceptar">
    </form>
    <?php
            } else {
              $numero1 = $_POST['numero1'];
              $numero2 = $_POST['numero2'];
              if ($numero1 != $numero2) {
                  if ($numero1 > $numero2) {
                    $aux = $numero1;
                    $numero1 = $numero2;
                    $numero2 = $aux;
                  }
                  for ($i = $numero1+7; $i <= $numero2; $i+=7) {
                    echo "$i  ";
                  }
                } else {
                 echo "Los números eran iguales, pruebe de nuevo";
              }
          }
        ?>

</body>

</html>