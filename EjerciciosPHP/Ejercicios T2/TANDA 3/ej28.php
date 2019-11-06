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
            $total = 1;
            for ($i=$numero; $i >=1 ; $i--) { 
                $total *=$i;
            }

            print $total;

        }else{
    ?>

        <form action="ej28.php" method="post">
        
            Indique un numero: <input type="number" name="numero" id=""><br>
            <input type="submit" value="Enviar">

        </form>
    
    <?php       
    
        }
    
    ?>
</body>
</html>