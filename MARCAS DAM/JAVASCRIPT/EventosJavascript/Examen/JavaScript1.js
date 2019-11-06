// JavaScript Document

var tabla= document.getElementById('tabla');

tabla.addEventListener('click',selec,false);

var tds=document.getElementsByTagName('td');

		var trs = document.getElementsByTagName('tr');





function selec(event)
	{
		var evento=event.target;
		
		for(var cont=0; cont<tds.length; cont++)
		{
			if(tds[cont]==evento)
			{
				tds[cont].className='azul';
				añadir(cont);
			}
		}
	}


function añadir(contador)
	{
		var fila=document.createElement('tr');
		var col1=document.createElement('td');
		var texto = document.createTextNode('hola');

		col1.appendChild(texto);

				var texto2 = document.createTextNode('hola');

		var col2=document.createElement('td');
		col2.appendChild(texto2);
		var texto3 = document.createTextNode('hola');

		var col3=document.createElement('td');
		col3.appendChild(texto3);
	
		fila.appendChild(col1);
		fila.appendChild(col2);
		fila.appendChild(col3);




		tds[contador].parentNode.parentNode.insertBefore(fila,tds[contador].parentNode.nextSibling);



	

		
		
		
		
	}