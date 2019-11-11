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
        echo "<table>";

        for($i=0;$i<=10;$i++){
            echo "<tr><td>".$numero." x ".$i." = ".($numero*$i)."</td></tr>";
        }

        echo "</table>"

    
    ?>

</body>
</html>