<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EJ 8</title>
</head>

<body>

    <?php 
    

    if(!isset($_POST['numero'])){

    $final="";
    $resultadoTablas="";

    }else{

        $numero = $_POST['numero'];
        $final = $_POST['final'];

        $final.=$numero;
     
    }


    if(strlen($final)==10){

        $arrayFinal1 = str_split($final);
        $resultadoTablas = "<table border=\"1\"><tr>";

        foreach ($arrayFinal1 as $key => $value) {
            $resultadoTablas.="<td>".$key."</td>";
        }
        $resultadoTablas.="</tr><tr>";
        
        foreach ($arrayFinal1 as $value) {
            $resultadoTablas.="<td>".$value."</td>";
        }
        $resultadoTablas.="</tr><table><br><br>";


        $resultadoTablas.= "<table border=\"1\"><tr>";

        foreach ($arrayFinal1 as $key => $value) {
            $resultadoTablas.="<td>".$key."</td>";
        }

        $arrayNuevo = array();
        $arrayNoPrimos= array();
        foreach ($arrayFinal1 as $key => $value) {
           
            $contadorPrimos=0;
            for ($i=1; $i <=$value ; $i++) { 
                if($value%$i==0) $contadorPrimos++;

            }
            if($contadorPrimos>2) {
              $arrayNuevo[] = $value;
            }else{
                $arrayNoPrimos[] = $value;
            }

        }

        foreach ($arrayNoPrimos as $key) {
            $arrayNuevo[] = $key;
        }

        $resultadoTablas.="</tr><tr>";

        foreach ($arrayNuevo as $key ) {
            $resultadoTablas.="<td>".$key."</td>";
        }

        $resultadoTablas.="</tr><table>";

        print $resultadoTablas;

    }else{

    ?>

    <form action="arrayPrimosTabla.php" method="post">
        Introduce un numero <input type="number" name="numero" id="" required><br>
        <input type="hidden" name="final" value="<?= $final ?>">
        <input type="submit" value="Enviar">
    </form>

    <?php
    }

    ?>
</body>

</html>