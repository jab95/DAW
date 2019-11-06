<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EJ 7</title>
</head>
<body>


<?php
  session_start();
  if (!isset($_SESSION["numeros"])) {
    $_SESSION["numeros"] = array();
    $_SESSION["contador"] = 0;
  }
  ?>
  <form action="" method="post">
    Introduzca numero: <input type="number" name="numero" required autofocus>
    <input type="submit" value="Mandar">
  </form>
  <?php
  if (isset($_POST["numero"])) {
    $_SESSION["contador"]++;
    array_push($_SESSION["numeros"], $_POST["numero"]);
    if ($_SESSION["contador"] == 8) {
      foreach ($_SESSION["numeros"] as $valor) {
        echo ($valor % 2 == 0) ? "<a style=\"color:red;\">" . $valor . "<a> " : "<a style=\"color:green;\">" . $valor . "<a> ";
      }
      session_destroy();
    }
  }
  ?>



    <?php 

    // $numero=0;
    // $arrayNumeros = array();
    // $arrayFinal= array();

    //     for ($i=0; $i <20 ; $i++) { 
    //         $numero = rand(0,100);
    //         $arrayNumeros[$i] = $numero;
    //     }

    // for ($i=0; $i < sizeof($arrayNumeros) ; $i++) { 
    //     for ($j=0; $j <=$i ; $j++) { 
    //         if ($arrayNumeros[$i]%2==0) {
    //             $temp = $arrayNumeros[$i];
    //             $arrayNumeros[$i] = $arrayNumeros[$j];
    //             $arrayNumeros[$j] = $temp;
    //         }
    //     }
    // }

    // foreach ($arrayNumeros as $key) {
    //     print $key."<br>";
    // }
    
    
    ?>
    
</body>
</html>