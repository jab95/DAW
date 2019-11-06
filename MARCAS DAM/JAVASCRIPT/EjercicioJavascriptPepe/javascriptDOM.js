function persona(nombre,nota1,nota2){

	this.nombre=nombre;
	this.nota1=nota1;
	this.nota2=nota2;

	this.media = function(){

		return (this.nota1+this.nota2)/2;

	}

	this.redondeo = function(){
		return Math.round(this.media());
	}

}

var arrayPersonas = [new persona('pepe',2.5,7),new persona('luis',4.5,6),new persona('juan',9,10)];

var cabezeraArray = ["NOMBRE","NOTA1","NOTA2","MEDIA","REDONDEO"];

var tabla = document.createElement('table');

var cabezera = document.createElement('tr');

var reglacssmenu = document.createAttribute('id');

reglacssmenu.value = 'menu1';

cabezera.setAttributeNode(reglacssmenu);



for(var i=0;i<cabezeraArray.length;i++){

	var cabezeratd = document.createElement('td');

	var textoCabezera = document.createTextNode(cabezeraArray[i]);

	cabezeratd.appendChild(textoCabezera);

	cabezera.appendChild(cabezeratd);

	tabla.appendChild(cabezera);


}


for(var i=0;i<arrayPersonas.length;i++){

	var trcontenido = document.createElement('tr');
	
	var tdNombre = document.createElement('th');
	var nombres = document.createTextNode(arrayPersonas[i].nombre);


	var tdnota1 = document.createElement('td');
	var nota1 = document.createTextNode(arrayPersonas[i].nota1);


	var tdnota2 = document.createElement('td');
	var nota2 = document.createTextNode(arrayPersonas[i].nota2);


	var tdmedia = document.createElement('td');
	var media = document.createTextNode(arrayPersonas[i].media());


	var tdredondeo = document.createElement('td');
	var redondeo = document.createTextNode(arrayPersonas[i].redondeo());


	tdNombre.appendChild(nombres);
	tdnota1.appendChild(nota1);
	tdnota2.appendChild(nota2);
	tdmedia.appendChild(media);
	tdredondeo.appendChild(redondeo);

	trcontenido.appendChild(tdNombre);
	trcontenido.appendChild(tdnota1);
	trcontenido.appendChild(tdnota2)
	trcontenido.appendChild(tdmedia);
	trcontenido.appendChild(tdredondeo);


	tabla.appendChild(trcontenido);

}


var body = document.getElementsByTagName('body')[0];

body.appendChild(tabla);


