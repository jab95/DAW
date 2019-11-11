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
    
    $num1 = $_POST['numero1'];
    $num2 = $_POST['numero2'];
    $num3 = $_POST['numero3'];

    $arrayNumeros = array($num1,$num2,$num3);
    sort($arrayNumeros,1);

    foreach ($arrayNumeros as $key) {
        print $key." ";
    }
    
    ?>
    
</body>
</html>