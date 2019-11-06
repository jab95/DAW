
<?php 

        function esCapicua($numero){

            $palabra = strval($numero);
            if($palabra == strrev($palabra)) return true;
            else return false;
            
        }

        function esPrimo($numero){
            
            $contadorPrimos=0;
            for ($i=1; $i <=$numero ; $i++) { 
                if($numero%$i==0) $contadorPrimos++;
            }
            if($contadorPrimos<=2) {
              return true;
            }else{
              return false;
            }
        }

        function siguientePrimo($numero){
            
            for ($i=($numero+1); $i <=($numero+20) ; $i++) { 

                $contadorPrimos=0;
                for ($j=1; $j <=$i ; $j++) { 
                    if($i%$j==0) $contadorPrimos++;
                }
                if($contadorPrimos==2) {
                    print $i;
                    return $i;
                  }
            }

        }

        function potencia($base,$exp){
            return pow($base,$exp);
        }

        function cuentaDigitos($numero){

            $numeroEntero = strval($numero);
            return strlen($numeroEntero);

        }

        function numeroReverse($numero){
            $numeroEntero = strval($numero);
            return strrev($numeroEntero);
        }

        function digitoEnPosicion($numero,$n){
            $numeroEntero = strval($numero);
            return $numeroEntero{$n};
        }

        function posicionDeDigito($numero,$digito){
            $numeroEntero = strval($numero);
            for ($i=0; $i <strlen($numeroEntero) ; $i++) { 
                if($numeroEntero{$i} == $digito){
                    return "La posicion del digito es".$i;
                }
            }
            return -1;
        }

        function quitaDigitos($numero,$digitos){
            $numeroEntero = strval($numero);
            $numeroFinal = substr($numeroEntero,0,strlen($numeroEntero)-$digitos);
            print $numeroFinal;
        }

        function quitaDigitos2($numero,$digitos){
            $numeroEntero = strval($numero);
            $numeroFinal = substr($numeroEntero,$digitos,strlen($numeroEntero));
            print $numeroFinal;
        }

        function pegaDigito($numero,$digito){
            $numeroEntero = strval($numero);
            $numeroFinal = $numeroEntero."".$digito;
            print $numeroFinal;
        }
        function pegaDigito2($numero,$digito){
            $numeroEntero = strval($numero);
            $numeroFinal = $digito."".$numeroEntero;
            print $numeroFinal;
        }

        function trozoNumero($numero,$inicio,$final){
            $numeroEntero = strval($numero);
            $numeroFinal = substr($numeroEntero,$inicio,$final);
            print $numeroFinal;
        }

        function juntaNumeros($numero1,$numero2){
            $numeroEntero = strval($numero);
            $numeroFinal = $numero1."".$numero2;
            print $numeroFinal;
        }

        function binarioDecimal($numero){

            $numeroString = strval($numero);
            $numeroFinal=0;
            $cont=0;
            for ($i= strlen($numeroString)-1; $i >=0  ; $i--) { 
                $numeroFinal +=  intval($numeroString{$cont})*pow(2,$i);
                $cont++;
            }

            print $numeroFinal;
        }

        function decimalBinario($numero){

            $numeroString = strval($numero);
            $numeroBinario = "";

            for ($i=$numero;  ceil($i) !=1 ; $i=$i/2) { 
                    $digito = $i%2;
                    $numeroBinario .=$digito;
                }
            print strrev($numeroBinario);

        }


        //19 FALTAAAAA

        

        


?>
    
