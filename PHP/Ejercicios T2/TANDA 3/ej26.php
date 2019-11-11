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
            $digito = $_POST['digito'];
            $arrayNumero = str_split($numero);
            $arrayPosiciones=null;
            $contadorArrayPosiciones = 0;
            for ($i=0; $i <sizeof($arrayNumero) ; $i++) { 
                if($arrayNumero[$i] == $digito) {
                    $arrayPosiciones[$contadorArrayPosiciones] = $i;
                    $contadorArrayPosiciones++;
                }
            }

            if ($arrayPosiciones!=null) {
                
                print "El digito ".$digito." esta en la posicion: ";
                for ($i=0; $i < sizeof($arrayPosiciones) ; $i++) { 
                    print ($arrayPosiciones[$i]+1)." ";
                }
        
            }

        }else{
    
    ?>

            <form action="ej26.php" method="post">

                Indique un numero: <input type="number" name="numero" id="" >
                Indique un digito: <input type="number" name="digito" min="0" max="9" id="" required>
                <input type="submit" value="Enviar">
            
            </form>

    <?php 
        }
    ?>
</body>

</html>