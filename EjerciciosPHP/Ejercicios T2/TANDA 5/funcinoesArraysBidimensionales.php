 

<?php


    function creaArrayBi($numeroFilas,$numeroColumnas,$indiceMin,$indiceMax){
        $arrayFinal=null;
        for ($i=0; $i <$numeroFilas ; $i++) { 
            for ($j=0; $j <$numeroColumnas ; $j++) { 
                $arrayFinal[$i][$j] = rand($indiceMin,$indiceMax); 
            }
        }
        return $arrayFinal;
    }

    function devueleFilaX($arrayBi,$fila){
        $arrayFinal = array();
        
        for ($i=0; $i < sizeof($arrayBi[$fila]) ; $i++) { 
               $arrayFinal[] = $arrayBi[$fila][$j];
            }
        }

        return $arrayFinal;
    
    }

    function devuelveColumnaX($arrayBi,$columna){
        $arrayFinal = array();
        
        for ($i=0; $i < sizeof($arrayBi) ; $i++) { 
                 $arrayFinal[] = $arrayBi[$i][$columna];
            }
        }

        return $arrayFinal;
    
    }
    
    function coordenadasEnArrayBiInt(){

    }

    function puntoSilla($arrayBi,$numero){
        $columnaQueSeEncuentra=0;
        $filaQueSeEncuentra=0;
        $contador=0;
        for ($i=0; $i < sizeof($arrayBi) ; $i++) { 
            $fila = array();
            for ($j=0; $j < sizeof($arrayBi[$i] ) ; $j++) { 
                $fila[] = $arrayBi[$i][$j];  
                if($fila[$j] == $numero){
                    $columnaQueSeEncuentra = $j;
                }
            }

            if(in_array($numero,$fila)){
                $filaQueSeEncuentra=$i;

                    for ($x=0; $x < sizeof($arrayBi[$filaQueSeEncuentra]) ; $x++ ) { 
                        $columna[] = $arrayBi[$x][$columnaQueSeEncuentra];
                    }
                  
                    if(min($fila)==$numero && max($columna)==$numero){
                        print "El numero es punto de silla de la fila ".$filaQueSeEncuentra." y columna ".$columnaQueSeEncuentra;
                    } 

                    break;
            }  

        }

    }

    function devuelveDiagonal($array,$fila,$columna,$direccion){

        $diagonal = $array[$fila][$columna];
        $contadorFilas=$fila;
        $contadorColumnas=$columna;
        $arrayDiagonalString="";
        $arrayDiagonal= array();
        $digito=0;

        if($direccion=="nose"){

            while($contadorColumnas< sizeof($array)){
                $digito = $array[$contadorFilas][$contadorColumnas];
                $contadorColumnas++;
                $contadorFilas++;
                $arrayDiagonalString.= $digito;
               
            }

            $contadorColumnas=$columna;
            $contadorFilas=$fila;
            
            while($contadorColumnas>0){
                $digito = $array[--$contadorFilas][--$contadorColumnas];
                $contadorColumnas--;
                $contadorFilas--;
                $arrayDiagonalString = $digito.$arrayDiagonalString;
               
            }

        }else if($direccion=="neso"){
            
            while($contadorColumnas>= 0){
                $digito = $array[$contadorFilas][$contadorColumnas];
                $contadorColumnas--;
                $contadorFilas++;
                $arrayDiagonalString.= $digito;
               
            }

            $contadorColumnas=$columna;
            $contadorFilas=$fila;
            
            while($contadorColumnas<sizeof($array)-1){
                $digito = $array[--$contadorFilas][++$contadorColumnas];
                $contadorColumnas++;
                $contadorFilas--;
                $arrayDiagonalString = $digito.$arrayDiagonalString;
               
            }
        }

        for ($i=0; $i < strlen($arrayDiagonalString) ; $i++) { 
            $arrayDiagonal[] = intval($arrayDiagonalString[$i]);
        }

        return $arrayDiagonal;
        
    }

    // $arrays = creaArrayBi(4,4,1,5);

    // for ($i=0; $i <sizeof($arrays) ; $i++) { 
    //     for ($j=0; $j <sizeof($arrays[$i]) ; $j++) { 
    //         print $arrays[$i][$j]." ";
    //     }
    //     print "<br>";
    //     }

    //     var_dump(devuelveDiagonal($arrays,1,2,"neso"));

    ?>