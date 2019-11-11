<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    La primera cifra es 
    
    <?php 

        $numeroArray = str_split($_POST['numero']);

        print array_values($numeroArray)[0];
    
    ?>
</body>
</html>