
var especial = document.getElementById('especial')

especial.setAttribute('id','rojo');

var importantes = document.getElementsByClassName('importante');

var longitudOriginal = importantes.length;

if(longitudOriginal>=1){

    for(var i=0;i<longitudOriginal;i++){

        importantes[0].className= 'amarillo';

    }

   

}

