<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EJ 4</title>
</head>

<body>

    <?php 
    
    $final="";

    if(!isset($_POST['numero1'])){

        for ($i=0; $i <20 ; $i++) { 
            $final .= rand(0,100)." ";
        }
    
        print $final;

    ?>

    <form action="cambiaOcurrencias.php" method="post">
        Introduce un numero a intercambiar: <input type="number" name="numero1" id="" required><br>
        Introduce un numero para el nuevo valor: <input type="number" name="numero2" id="" required>
        <input type="hidden" name="final" value="<?= $final ?>">
        <input type="submit" value="Enviar">
    </form>

    <?php

    }else{

        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $final = $_POST['final'];

        $cambiado = str_replace($numero1,$numero2,$final);
        $arrayFinal = explode(" ",$cambiado);

        foreach ($arrayFinal as $key) {
            if($key==$numero2) print '<font color="red">'.$key.'</font><br>';
            else print $key."<br>";
        }
    }
    ?>
</body>

</html>