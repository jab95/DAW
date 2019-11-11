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

        if(isset($_POST['numero1'])){

            $numero1= $_POST['numero1'];
            $numero2 = $_POST['numero2'];

            print "Los numeros desde ".$numero1." hasta 1, no divisibles entre ".$numero2." son: ";

            for ($i=$numero1; $i >=1 ; $i--) { 
                    if($i%$numero2!=0){
                            print $i." ";
                    }
            }

        }else{
    ?>

    <form action="ej29.php" method="post">
    
        Indique un numero: <input type="number" name="numero1" id=""><br>
        Indique otro numero: <input type="number" name="numero2" id="" required><br>
        <input type="submit" value="Enviar">

    </form>

    <?php
    
        }

    ?>
    
</body>
</html>