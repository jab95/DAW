let num1 = 0;
let num2 = 0;
let enviar = true;

window.onload = () => {
  let suma = document.getElementById("suma");

  num1 = Math.floor(Math.random() * 10 + 1);
  num2 = Math.floor(Math.random() * 10 + 1);

  suma.innerHTML = num1 + " + " + num2 + " = " + suma.innerHTML;
};

ValidaCB = () => {
  let submit = document.getElementById("submit");

  submit.disabled = !document.querySelector("#condiciones:checked");
};

ValidaNombre = () => {
  let nombre = document.getElementById("nombre");
  let errorNombre = document.getElementById("errorNombre");
  let expRegNombre = /[A-Za-z]/;

  if (!expRegNombre.test(nombre.value)) {
    enviar = false;
    nombre.focus();
    errorNombre.innerHTML = "Nombre incorrecto, esbribalo bien";
  } else {
    errorNombre.innerHTML = " ";
    enviar = true;
  }
};

ValidaCorreo = () => {
  let correo = document.getElementById("correo");
  let errorCorreo = document.getElementById("errorCorreo");
  let expRegCorreo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

  if (!expRegCorreo.test(correo.value)) {
    enviar = false;
    correo.focus();
    errorCorreo.innerHTML = "Correo mal escrito, escribelo de nuevo";
  } else {
    errorCorreo.innerHTML = "";
    enviar = true;
  }
};

ValidaContraseñas = () => {
  let contra = document.getElementById("contra");
  let errorContra = document.getElementById("errorContra");
  let contra2 = document.getElementById("contra2");
  let errorContra2 = document.getElementById("errorContra2");

  if (contra.value.length == 0 || /\s/g.test(contra.value)) {
    enviar = false;
    errorContra.innerHTML =
      "La contraseña debe tener al menos 8 caracteres y contener 1 digito";
  } else {
    errorContra.innerHTML = "";
    enviar = true;
  }
  if (contra2.value != contra.value) {
    enviar = false;
    errorContra2.innerHTML = "Las contraseñas deben de ser iguales";
  } else {
    errorContra2.innerHTML = "";
    enviar = true;
  }
};

Validar = () => {
  let errorSuma = document.getElementById("errorSuma");
  let resultadoSuma = document.getElementById("resultadoSuma");
  //   let expRegContra = /\w\d+{8,}/;

  ValidaNombre();
  ValidaCorreo();
  ValidaContraseñas();

  if (resultadoSuma.value != num1 + num2) {
    enviar = false;
    resultadoSuma.focus();
    errorSuma.innerHTML = "La suma esta mal, resuelvela de nuevo";
  } else {
    errorSuma.innerHTML = "";
    enviar = true;
  }

  return enviar;
};
