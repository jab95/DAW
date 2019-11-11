<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EJ 11</title>
</head>
<body>

    <?php 

    if(isset($_POST['palabra'])){

        $diccionario = array('hola'=>'hello','adios'=>'bye','casa'=>'house','perro'=>'dog','gato'=>'cat','coche'=>'car');
        $palabra = $_POST['palabra'];
        $palabraIngles="";
    
        foreach ($diccionario as $key => $value) {
            if($palabra==$key) $palabraIngles=$value;
        }

        if(empty($palabraIngles)) print "No se ha encontrado la palabra en el diccionario";
        else print $palabra." - ".$palabraIngles;

    
    }else{

    ?>

        <form action="miniDiccionario.php" method="post"> 

            Introduzca una palabra: <input type="text" name="palabra" id=""><br>
            <input type="submit" value="Traducir">


        </form>



    <?php



    }
    
    ?>
    
</body>
</html>