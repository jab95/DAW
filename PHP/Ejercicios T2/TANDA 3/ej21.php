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

            $numeroIntroducido=0;
            $contadorNumeros=0;
            $contadorPares=0;
            $contadorImpares=0;

        }else{
            $contadorNumeros = $_POST['contadorNumeros'];
            $numeroIntroducido = $_POST['numero'];
            $pares = $_POST['pares'];
            $impares = $_POST['impares'];

            if($numeroIntroducido>0){ 
                
                $contadorNumeros++;
                if($numeroIntroducido%2==0) {
                    $contadorPares++;
                    $pares = $pares."".$numeroIntroducido;

                }else{
                    $contadorImpares++;
                    $impares = $impares."".$numeroIntroducido;
                };
            }

        }

        if($numeroIntroducido<0){
            print "Se han introducido ".$contadorNumeros." numeros.<br>";
            $arrayImpares = str_split($impares);
            $arrayPares = str_split($pares);
            $total=0;
            for ($i=0; $i < sizeof($arrayImpares) ; $i++) { 
                $total += $arrayImpares[$i];
            }
            print "La media de los numeros impares es ".($total/sizeof($arrayImpares))."<br>";
            print "El valor maximo de los pares es ".max($arrayPares);

        }else{

            print '<form action="ej21.php" method="post">';
            print 'Introduce un numero: <input type="number" name="numero" id="">';
            print '<input type="hidden" name="contadorNumeros" value="'. $contadorNumeros. '">';
            print '<input type="hidden" name="pares" value="'. $pares. '">';
            print '<input type="hidden" name="impares" value="'. $impares. '">';
            print '<input type="submit" value="Enviar">';
            print '</form>';
        }

?>

</body>

</html>