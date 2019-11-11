
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


function obtenerDivisores($array){
			
    $matriz[sizeof($array)][] = null; 
    
    //INICIALIZAMOS LA MATRIZ, LA POSICION DE LAS COLUMNAS LAS DEJAMOS VACIAS 
    
    //HACER UN METODO QUE TE DEVUELVA UN ARRAY CONLOS DIVISORES
    
    for($fil=0;$fil<sizeof($array);$fil++){
        
        $matriz[$fil]=vectorDivisores($array[$fil]); //POR CADA POSICION DE LA FILA, METEMOS EL ARRAY ANTERIORMENTE CREADO 
                                                     //A TRAVES DE LOS DIVISORES
        
    }
        return $matriz;
    
    }


function numDivisores($num){ //VA A CONTAR LOS NUMEROS DE DIVISORES QUE TIENE EL NUMERO, 
                                        //PARA DESPUES INICIALIZAR UN ARRAY EN OTRO METODO CON LONGITUD NUMERO DE DIVISORES
    

    $contDivisores=0;
    
    for($i=1;$i<=$num;$i++){
        
        if($num%$i==0){ //VEMOS SI ES DIVISOR 
                
            $contDivisores++; //SI ES DIVISOR SUMAMOS EL CONTADOR PARA QUE NOS DE EL NUMERO DE DIVISORES QUE TENDRA

        }
    }

    return $contDivisores;
}



function vectorDivisores($num){  //VAMOS A CREAR UN ARRAY CON LONGITUD RESPECTO AL METODO ANTERIOR
    
    $vector=array(numDivisores($num)); //INICIALIZAMOS EL VECTOR QUE PONDREMOS EN CADA FILA DE LA MATRIZ
    $ind=0; //CREAMOS UNA VARIALBE PARA QUE EN CADA POSICION EMPEZANDO DE 0 EN EL ARRAY META EL DIVISOR
    
    for($cont=1;$cont<=$num;$cont++){ //EMPEZAMOS EN 1 YA QUE TIENE QUE DIVIDIR, Y NO PUEDE DIVIDIR ENTRE 0
        
        if($num%$cont==0){     //AHORA VEMOS SI ES DIVISOR Y SI ES DIVISOR
            
            $vector[]=$cont;		//LO ASIGNAMOS A LA POSICION[IND] DEL ARRAY
            $ind++;	//SUMAMOS 1 AL BUCLE
            
        }
    }

    return $vector;
    
}

$array = array(8,3,45,32,2);
$matriz = obtenerDivisores($array);

for ($i=0; $i < sizeof($matriz) ; $i++) { 
    for ($j=0; $j <sizeof($matriz[$i]) ; $j++) { 
        print $matriz[$i][$j]." ";
    }
    print "<br>";
}
?>




</body>
</html>