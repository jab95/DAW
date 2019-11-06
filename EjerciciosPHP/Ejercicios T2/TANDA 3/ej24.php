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


    if(isset($_POST['altura'])){

        $altura  = $_POST['altura'];
        $cuadradosAPintar = 1;
        $espacios = $altura ;
        $indiceNumeroIzquierda=1;
        $indiceNumeroDerecha=0;



for ($i = 0; $i < $altura; $i++) {

    for ($j = 0; $j < $espacios; $j++) {
        print "&nbsp";
    }
    $espacios--;

    for ($cuad = 0; $cuad < $cuadradosAPintar; $cuad++) {
        if($cuad<($cuadradosAPintar/2)) print $indiceNumeroIzquierda++;
        else {
            $indiceNumeroDerecha=--$indiceNumeroIzquierda;
            print --$indiceNumeroDerecha;
        }

    }
    $cuadradosAPintar += 2;
    $indiceNumeroIzquierda=1;
    $indiceNumeroDerecha=0;
    
    print "<br>";
}
    }else{
?>
    <form action="ej24.php" method="post">
        Indica un numero para la altura: <input type="number" name="altura" id=""><br>
        <input type="submit" value="Mostrar piramide">
    </form>
    <?php 
        } 
    ?>


</body>

</html>