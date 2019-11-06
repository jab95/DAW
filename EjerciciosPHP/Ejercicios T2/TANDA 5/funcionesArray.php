<?php 

    function generaArrayInt($tamaño,$min,$max){

        $array = array();
        for ($i=0; $i < $tamaño; $i++) { 
            $array[] = rand($min,$max);
        }

        return $array;
    }

    function devuelveMinimo($array){
        return min($array);
    }

    function devuelveMaximo($array){
        return max($array);
    }

    function mediaArray($array){
        $total=0;
        foreach ($array as $key ) {
            $total +=$key;
        }
        print $total/sizeof($array);
    }

    function estaEnArray($numero,$array){
        if(in_array($numero,$array)) return "Si";
        else return "No";
    }

    function arrayReverse($array){
        return array_reverse($array);
    }

    function rotarDerechaArray(&$array,$rotar)
    {
            for ($i = 0; $i < $rotar; $i++) {
                array_push($array, array_shift($array));
            }
       return $array;

    }

    
    function rotarIzquierdaArray(&$array,$rotar)
    {
            for ($i = 0; $i < $rotar; $i++) {
                array_unshift($array, array_pop($array));
            }
       return $array;

    }

   
?>