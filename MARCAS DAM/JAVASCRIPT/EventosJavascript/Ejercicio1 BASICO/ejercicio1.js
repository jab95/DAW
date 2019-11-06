

function creaDiv(e){

    var evento=e;
    var target = e.target;

    var coordenadaX = evento.clientX;
    var coordenadaY = evento.clientY;

    target.className = 'rojo';

    var body = document.getElementsByTagName('body')[0];


    var coordenadas = document.createTextNode('Coordenadas:'+coordenadaX+':'+coordenadaY);


    var div = document.createElement('div');
    

    div.appendChild(coordenadas);

    body.appendChild(div);


    

}


function principal(){
    
    var el = document.getElementsByTagName('p');

    for(var i=0;i<el.length;i++){

        
        el[i].addEventListener('click',function(e){creaDiv(e)},false);

    }

    
}

//LO PRIMERO QUE SE EJECUTARA CUANDO SE ABRA LA PAGINA
window.addEventListener('load',principal,false);


