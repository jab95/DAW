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


;




var cuerpo =  '<table border="1"><tr id="menu1"><td>NOMBRE</td><td>NOTA1</td><td>NOTA2</td><td>MEDIA</td><td>REDONDEO</td></tr>';



for(var i=0;i<arrayPersonas.length;i++){

    cuerpo += "<tr><th>"+arrayPersonas[i].nombre+"</th><td>"+arrayPersonas[i].nota1+"</td><td>"+arrayPersonas[i].nota2+"</td><td>"+arrayPersonas[i].media()+"</td><td>"+arrayPersonas[i].redondeo()+"</td></tr>";

}

cuerpo += "</table>";

document.getElementsByTagName("body")[0].innerHTML = cuerpo;



