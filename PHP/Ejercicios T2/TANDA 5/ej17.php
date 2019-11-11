<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php include 'funcionesArray.php';?>
    <?php 

        $array = array(1,2,3,4,5);

        rotarDerechaArray($array,4);

        var_dump($array);
        // binarioDecimal(110101);
    ?>
    
</body>
</html>