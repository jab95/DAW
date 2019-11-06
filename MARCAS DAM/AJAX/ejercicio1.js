

var xhr = new XMLHttpRequest();

xhr.onload = function(){
	
	if(xhr.status === 200){
		
		var respuesta = JSON.parse(xhr.responseText);
		
		
		alert(respuesta.ciudades[0].Nombre);
			
		var contenido = '<table>';
		for(var i=0;i<respuesta.ciudades.length;i++){
			
			
			contenido += '<tr>';
			contenido += '<td><img src="'+respuesta.ciudades[i].Icono+'"/></td>';
			contenido += '<td>'+respuesta.ciudades[i].Nombre+'</td>';
			contenido += '<td>'+respuesta.ciudades[i].Viento+'</td>';
			contenido += '<td>'+respuesta.ciudades[i].Temperatura+'</td>';
			contenido +='</tr>';	
		}
		
		contenido += '</table>';
		
		document.getElementById('todo').innerHTML = contenido;
		
	}
	
	
	
};

xhr.open('GET','ejercicio1.json',true);
xhr.send(null);