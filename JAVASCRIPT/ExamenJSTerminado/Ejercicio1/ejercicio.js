let enviar = true;
let dia= null;
let mes=null;
let año=null;
const MESES = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
let selectProvin = null;
let json=null;
let arrayJSON = [];

Main = () => {


    dia = document.getElementById("dia");
    mes = document.getElementById("mes");
    año = document.getElementById("año");
    selectProvin = document.getElementById("provincias");

    RellenaFechas();
    RellenaProvincias();

    // arrayJSON.sort();


};


RellenaFechas = ()=>{
            for (let index = 1; index <= 31; index++) {
                dia.innerHTML+=`<option value="${index}">${index}</option>`;
            }

            for (let index = 0; index < MESES.length; index++) {
                mes.innerHTML+=`<option value="${MESES[index]}" >${MESES[index]}</option>`;
            }

            for (let index = 2019; index >= 1900; index--) {
                año.innerHTML+=`<option value="${index}">${index}</option>`;
            }

}

RellenaProvincias = ()=>{

    json = JSON.parse(provincias);

    Object.keys(json).map(function(_) { return json[_]; })

    json.sort();

    for (let index = 0; index < json.length; index++) {
        selectProvin.innerHTML+=`<option value="${json[index]}">${json[index]}</option>`;
    }

}

ValidaFechas = ()=>{

    let valido=true;
    let errorFechas = document.getElementById("errorFechas");

    if(dia.value==29 || dia.value==30 || dia.value==31){
        if(mes.value==1){
            if(año.value%4!=0){
                valido=false;
                errorFechas.innerHTML="Fecha mal introducida, el año elegido no es bisiesto";
            }else{
                errorFechas.innerHTML="";

            }

        }
    }

    return valido;
}

ValidaProvincias = ()=>{

    let errorProvincias = document.getElementById("errorProvincias");
    let valido = true;
  
    if (selectProvin.value == 0) {
      valido = false;
      errorProvincias.innerHTML = "Debe de seleccionar una provincia de la lista";
    } else errorProvincias.innerHTML = "";
    return valido;
}

ValidaCB = () => {
  let submit = document.getElementById("submit");

  submit.disabled = !document.querySelector("#condiciones:checked");
};

// ValidaNombre = () => {
//   let nombre = document.getElementById("nombre");
//   let errorNombre = document.getElementById("errorNombre");
//   let expRegNombre = /[A-Za-z]/;

//   if (!expRegNombre.test(nombre.value)) {
//     enviar = false;
//     nombre.focus();
//     errorNombre.innerHTML = "Nombre incorrecto, esbribalo bien";
//   } else {
//     errorNombre.innerHTML = " ";
//     enviar = true;
//   }
// };

ValidaCorreo = () => {
  let correo = document.getElementById("correo");
  let errorCorreo = document.getElementById("errorCorreo");
  let expRegCorreo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

  if (!expRegCorreo.test(correo.value)) {
    enviar = false;
    errorCorreo.innerHTML = "Correo mal escrito, escribelo de nuevo";
  } else {
    errorCorreo.innerHTML = "";
    enviar = true;
  }

  return enviar;
};

ValidaContraseña = () => {
  let contra = document.getElementById("contra");
  let errorContra = document.getElementById("errorContra");
  let exprContra = /^[A-ZÑ](?=.*\d)(?=.*\_)\w{5,12}$/;

  if (contra.value.length == 0 || !exprContra.test(contra.value)) {
    enviar = false;
    errorContra.innerHTML =
      "La contraseña debe tener entre 5 hy 12 caracteres, empezar por mayuscula y contener al menos 1 digito y un guion bajo";
  } else {
    errorContra.innerHTML = "";
    enviar = true;
  }

return enviar;
  
};

Validar = () => {

    if(!ValidaContraseña() || !ValidaCorreo() || !ValidaProvincias()|| !ValidaFechas() ) return false;
    else return true;
    
};



addEventListener("load",Main);

