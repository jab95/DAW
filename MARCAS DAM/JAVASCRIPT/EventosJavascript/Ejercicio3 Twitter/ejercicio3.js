function ultimaTecla(e){

    var ultimaLetra = document.getElementById('ultimaLetra');
    var teclaPulsada = e.keyCode;

    ultimaLetra.innerHTML = 'Ultima letra pulsada: '+teclaPulsada;

    var texto = document.getElementsByTagName('textarea')[0].value;
    var caracteres = document.getElementById('caracteresFaltantes');
    var largo = texto.length;

    caracteres.innerHTML = 140-texto.length;

    if(largo<=texto.maxLength){
        caracteres.innerHTML = 140-texto.length;

    }else{
        evento.value = caracteres.innerHTML;
    }

}

function principal(){   
     document.addEventListener('keyup',function(e){ultimaTecla(e)},false);

}

window.addEventListener('load',principal,false);