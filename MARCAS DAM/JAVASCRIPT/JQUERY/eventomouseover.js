// JavaScript Document

jQuery.fn.divtip = function(textotip) {

this.each(function(){

elem = $(this);

var mitip = $('<div class="nuevoDiv">'+textotip+'</div>');
//inserto el DIV después del elemento textarea

$(document.body).append(mitip);

elem.data("capatip", mitip);


elem.on('mouseover',function(e){
	
	var $mitip = $(this).data("capatip");
	mitip.css('left',e.pageX+10);
	mitip.css('top',e.pageY+5);
	mitip.show(500);	
		
	
});

elem.on('mouseout',function(e){
	
	var $mitip = $(this).data("capatip");
	mitip.hide(500);
	


});

});

return this;

};

$(document).ready(function(){
$("#divAzul").divtip("guay");
$("#frase").divtip("bien");
});