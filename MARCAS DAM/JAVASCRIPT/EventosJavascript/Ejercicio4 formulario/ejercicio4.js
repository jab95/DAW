

function buenaEleccion(){

var select = document.getElementsByTagName('select')[0].selectedIndex;
var eleccion = document.getElementById('buenaEleccion');
   
    if(select ==1){
        eleccion.innerHTML = 'Buena eleccion!!';
    }else{

        eleccion.innerHTML = ' ';

    }
    

}





function envio(e){

    var event = e.target;

    var errorCondiciones = document.getElementById('error');
    var checkbox = document.getElementById('CheckCondiciones');
   
    
    if(checkbox.checked){

        errorCondiciones.innerHTML = ' ';
        event.preventDefault();

        
    }else{

        errorCondiciones.innerHTML = 'Debe de pulsar el check antes de enviar';
        e.stopPropagation()

      
    }

}

function enviar(){





}



function main(){

var seleccion = document.getElementsByTagName('select')[0];
seleccion.addEventListener('click',buenaEleccion,false);

var checkbox = document.getElementById('CheckCondiciones');
checkbox.addEventListener('change',function(e){envio(e)},false);



}


window.addEventListener('load',main,false);