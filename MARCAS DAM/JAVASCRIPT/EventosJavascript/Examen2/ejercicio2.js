



function Persona(nombre,edad,peso){
	this.nombre=nombre;
	this.edad=edad;
	this.peso=peso;


}

var arrayPersonaspersona;

function main(){

    var datos = document.getElementsByClassName('dato');
    var numPersonas = (datos.length/3);

    arrayPersonaspersona = new Array(numPersonas);



    for(var i=0;i<numPersonas;i++){

        arrayPersonaspersona[i] = new Persona(datos[i].textContent,datos[i+3].textContent,datos[i+6].textContent);
    }
	
    

    window.addEventListener('click',listaDatos,false);



}

function listaDatos(e){

    var pagina = document.getElementsByTagName('body')[0];
    

    var lista = document.createElement('ul');

    for(var i=0;i<3;i++){

        var li = document.createElement('li');

        var textoLi = document.createTextNode(arrayPersonaspersona[i].nombre+arrayPersonaspersona[i].edad+arrayPersonaspersona[i].peso);

        li.appendChild(textoLi);
        lista.appendChild(li);
    }

    



pagina.appendChild(lista);

  
lista.style.position = 'absolute';
lista.style.top = e.clientY+'px';
lista.style.left = e.clientX+'px';





}


window.addEventListener('load',hola,false);