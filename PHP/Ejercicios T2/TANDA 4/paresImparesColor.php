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
    if(!isset($_POST['numero'])){
        $numeros = array();
    }else{
        $numero = $_POST['numero'];
        $numeros = $_POST['numeros'];
        $numeros[] = $numero;
    }

    if(sizeof($numeros)==8){

        foreach ($numeros as $key) {
            if(intval($key)%2==0) print '<font color="red">'.$key.'</font><br>';
            else print '<font color="green">'.$key.'</font><br>';
        }

    } else{
    ?>

    <form action="paresImparesColor.php" method="post">

        Introduce un numero: <input type="number" name="numero" id=""><br>
        <input type="submit" value="Enviar">
        <input type="hidden" name="numeros" value="<?= $numeros ?>">
    </form>



    <?php
    }
    
    
    ?>

</body>

</html>