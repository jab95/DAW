
var cuerpo = $('body');
document.getElementsByName();
var arrayCoches;
var $datosCoche = $('.datos');
var trs= $('tr');
var listaCreada = $('.listaCreada');

function Coche(marca,modelo,potencia){

    this.marca=marca;
    this.modelo=modelo;
    this.potencia=potencia;

}




$(function(){
	
	arrayCoches = new Array(3);

	for(var i=0;i<3;i++){
		
		arrayCoches[i] = new Coche(datosCoche.ge,datosCoche.get(i+3).textContent,datosCoche.get(i+6).textContent);
	
	}
	
	
	
	
	$(document).on('click',function(e){
	

		var posicionX = e.pageX;
		var posicionY = e.pageY;
		
		
		//BORRAMOS LISTA ANTERIOR, MENOS LA PRIMERA VEZ
		if(listaCreada!=null){
			
			$('.listaCreada').remove();
			
		}
		
		var lista = $('<ul id="caja">');
		lista += $('<li>'+arrayCoches[0].marca+' '+arrayCoches[0].modelo+' '+arrayCoches[0].potencia+'</li>');
	
		lista += $('<li>'+arrayCoches[1].marca+' '+arrayCoches[1].modelo+' '+arrayCoches[1].potencia+'</li>');
		lista += $('<li>'+arrayCoches[2].marca+' '+arrayCoches[2].modelo+' '+arrayCoches[2].potencia+'</li>');
		lista += $('</ul>');
		
		lista.css('position','absolute');
		lista.css('left',posicionY+'px');
		lista.css('top',posicionX+'px');
	
		
		
		//MARCAR LISTA PARA UN BORRADO POSTERIOR
		lista.add('class','listaCreada');
		
		
		
		cuerpo.append(lista);

});	

	

})

	
	


	

