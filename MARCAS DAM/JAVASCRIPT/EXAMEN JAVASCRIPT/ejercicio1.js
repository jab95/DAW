
var cad = '<table id="tabla" border="1"><tr><td></td><td></td><td></td><td></td><td></td><td></td></tr></table>';

document.getElementsByTagName('body')[0].innerHTML+=cad;

var numeroAleatorio = Math.round(Math.random(10)+1);



function pulsar(e){

    

var array = [numeroAleatorio,numeroAleatorio,numeroAleatorio,numeroAleatorio,numeroAleatorio,numeroAleatorio];

    var target = e.target;
    var tds = document.getElementsByTagName('td');

    var tabla = document.getElementById('tabla');

    for(var i=0;i<tds.length;i++){

        if(tds[i]==target){


            tds[i].textContent = array[i];


        }

    }

    function cambiaColor(){


        this.className = 'rojo';

    }


    function main(){

        var tabla = document.getElementById('tabla');

        tabla.addEventListener('click',pulsar,false);
        tabla.addEventListener('click',cambiaColor,false);


    }

    window.addEventListener('load',main,false);

