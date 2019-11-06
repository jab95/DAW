

var colorElegido;
var turno=0;

var hasGanado = false;
var hasPerdido = false;

var colores=['rojo','verde','azul','amarillo','marron','naranja','negro','blanco'];
var chinchetas = ['ninguno','blanco','rojo'];

var numChinchetasRojas = 0;
var numChinchetasBlancas = 0;

var arrayJugador=new Array()
var arrayPista=new Array();
var arraySolucion=new Array();
var valor;

function inicio(){


}

function Casilla(color,ocupada){
	this.color=color;
	this.ocupada=ocupada;
}




function cogerColor(e){

    var colores = document.getElementsByClassName('color');

    for(var i=0;i<colores.length;i++){

        if(e.target==colores[i]){

            colorElegido = i;

        }
    }

 
}

function pintarColores(e){


    if(hasGanado == true || hasPerdido == true){

        return ;
    }

    var pintarCasilla = document.getElementsByClassName('prueba');

	var arrayTablero=new Array();
	var contadorFilas=0;

    for(var i=0;i<40;i=i+4){

        arrayTablero[contadorFilas]=[pintarCasilla[i],pintarCasilla[i+1],pintarCasilla[i+2],pintarCasilla[i+3]];
		contadorFilas++;


    }

    for(var i=0;i<arrayTablero.length;i++){
        for(var j=0;j<4;j++){

            if((e.target==arrayTablero[i][j]) && i==turno){

                arrayTablero[i][j].setAttribute('class',''+colores[colorElegido]);
                arrayJugador[j]=new Casilla(colorElegido,true);

            }

        }



    }

}


function ponerChinchetas(){

    var arrayTablaPista = document.getElementsByClassName('tablaPista');

    var arrayCeldasChinchetas=arrayTablaPista[turno].getElementsByTagName('td');


    var contadorChinchetas =0;
    for(var i=0;i<numChinchetasRojas;i++){

        arrayCeldasChinchetas[contadorChinchetas] = coloreo;
    contadorChinchetas++;
    }

    for(var i=0;i<numChinchetasBlancas;i++){

        arrayCeldasChinchetas[contadorChinchetas] = coloreo;
    contadorChinchetas++;
    }

}

function mostrarSolucion(){

    var soluciones = document.getElementsByClassName('muestra');

    for(var i=0;i<soluciones.length;i++){

        soluciones[i].setAttribute('class','muestra '+ colores[arraySolucion[i]]);

        

    }



}


function botonIniciar(){


    if(hasGanado == true || hasPerdido == true){
        return ;
    }


   var arrayBotones = document.getElementsByClassName('checkeador');

   


   if(this!=arrayBotones[turno]){ return;}


   for(var i=0;i<arrayJugador.length;i++){



   }

   if(numChinchetasRojas==4){

        prompt('HAS GANADO!');
        mostrarSolucion();
        hasGanado=true;

   }else if(turno==9){
        prompt('HAS PERDIDO!');
        mostrarSolucion();
        hasPerdido=true;
    }else{

           turno++;
           
           for(var i=0;i<arrayJugador.length;i++){

                arrayJugador[i].ocupada = false;
                

           }


    }

    

   
        

    }







function main(){

    
    for(var i=0;i<4;i++){

       valor = Math.random()*8;
       arraySolucion[i] = Math.round(valor)
    }

   var tabla = document.getElementById('tabla');
   var tabla2 = document.getElementById('tabla2');
   var botones = document.getElementsByClassName('checkeador');


   tabla.addEventListener('click',pintarColores,false);
   tabla2.addEventListener('click',cogerColor,false);
   for(var i=0;i<botones.length;i++){
       botones[i].addEventListener('click',botonIniciar,false);
   }

}

window.addEventListener('load',main,false);