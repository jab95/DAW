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

    if(isset($_POST['numero'])){

        $numero = $_POST['numero'];

        print strrev($numero);

    }else{
?>

        <form action="ej25.php" method="post">
        
            Indique un numero: <input type="number" name="numero" id=""><br>
            <input type="submit" value="Mostrar numero al reves">

        </form>

<?php
    }

?>
    
</body>
</html>