
function Coche(marca,modelo,potencia){

    this.marca=marca;
    this.modelo=modelo;
    this.potencia=potencia;

}





var array;

function main(){

var tds = document.getElementsByTagName('td');

var elementos = tds.length/4;

array = new Array(elementos);

var contador=1;

for(var i=0;i<elementos;i++){

    array[i] = [new Coche(tds[contador].textContent,tds[contador+4].textContent,tds[contador+8])]
	contador++;
}

    window.addEventListener('click',pulsar,false);


}


var estaCreada = false;

function pulsar(e){

    var lista = document.createElement('ul');
    lista.setAttribute('id','idLista');

    for(var i=0;i<3;i++){

        var li = document.createElement('li');
        var textoli = document.createTextNode(array[i].marca+' '+array[i].modelo+' '+array[i].potencia);


        li.appendChild(textoli1);
        lista.appendChild(li);
    }

    var cuerpo = document.getElementsByTagName('body')[0];

    cuerpo.appendChild(lista);

    lista.style.top = e.clientY+'px';
    lista.style.left = e.clientX+'px';
    lista.style.position = 'absolute';

}

window.addEventListener('load',main,false);    
