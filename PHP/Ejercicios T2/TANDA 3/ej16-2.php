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
    
        $numero = $_POST['numero'];
        $contador=0;
        for($i=$numero;$i>=1;$i--){
            if($numero%$i==0) $contador++;
        }

        if($contador>2) print "No es primo";
        else print "Si es primo";

    
    ?>
</body>
</html>