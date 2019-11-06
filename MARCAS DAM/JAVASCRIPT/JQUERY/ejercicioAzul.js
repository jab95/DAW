


$(function(){

	$('#boton').click(function(){
		
		$('p').azular();
		
	});

});

	
	


jQuery.fn.azular = function(){

		this.each(function(){
			
			elemento = $(this);
			
			elemento.css("color","#C00");
		
				
		});
	
	return this;
	
};