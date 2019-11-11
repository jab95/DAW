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
 
 $numeroArray = str_split($_POST['numero']);

 $numeroArray = array_diff($numeroArray, array('-'));

 print sizeof($numeroArray);

 ?>
    
</body>
</html>