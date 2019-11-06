

var cambiaP = function(mensaje){

    var parrafoCambio = document.getElementById('aCambiar');
    parrafoCambio.innerHTML = mensaje;
}

var evento1 = document.getElementById('aCambiar');
evento1.addEventListener('click',function(){ cambiaP('Este es el nuevo contenido del parrafo')},false);

