//MOSTRAR EN LINEAS SEPARADAS DATOS DE 3 PERSONAS QUE VAN A TENER NOMBRE, EDADY PESO

//USAR ARRAY DE OBJETOS PERSONAS



function persona(nombre,edad,peso){

	this.nombre=nombre;
	this.edad=edad;
	this.peso=peso;

}

var arrayPersonas = [new persona('pepe',75,30),new persona('luis',15,75),new persona('juan',20,110)];



document.write('<table border="1"><tr><td>NOMBRE</td><td>EDAD</td><td>PESO</td></tr>');



for (var index = 0; index < arrayPersonas.length; index++) {
	document.write('<tr>')
		document.write('<td>'+arrayPersonas[index].nombre+'</td>');
		document.write('<td>'+arrayPersonas[index].edad+'</td>');
		document.write('<td>'+arrayPersonas[index].peso+'</td>');

	document.write('</tr>')
}

document.write('</table>')
