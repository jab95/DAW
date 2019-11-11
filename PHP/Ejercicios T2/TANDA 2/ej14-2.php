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

    if(($numero%2)==0) 
       print "Es par ";
    else 
        print"No es par ";

    if(($numero%5) ==0)
        print " y es divisible entre 5";
    else 
        print " y no es divisible entre 5";

    ?>
</body>
</html>