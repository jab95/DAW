let error1 = null;
let error2 = null;
let error3 = null;
let error4 = null;
let contadorAcertados;
let intentos = 0;
let acierto;

Corregir = e => {
  error1 = document.getElementById("error1");
  error2 = document.getElementById("error2");
  error3 = document.getElementById("error3");
  error4 = document.getElementById("error4");
  let parrafoAciertos = document.getElementById("aciertos");
  contadorAcertados = 0;
  acierto = 0;

  CompruebaChB();
  CompruebaRadios();
  CompruebaCombo();
  CompruebaSuma();

  if (contadorAcertados != 4) {
    intentos++;
    e.innerHTML = "Reintentar";
  } else e.disabled = true;

  if (acierto < 0) acierto = 0;
  parrafoAciertos.innerHTML =
    acierto + "% de preguntas acertadas, llevas " + intentos;
};

CompruebaChB = () => {
  let cb1 = document.getElementById("cb1");
  let cb2 = document.getElementById("cb2");
  let cb3 = document.getElementById("cb3");
  let acertado = true;

  if (!cb1.checked || cb2.checked || !cb3.checked) acertado = false;
  CompruebaAcertado(acertado, error1);
};

CompruebaRadios = () => {
  let radios = document.getElementsByName("radio");
  let acertado = true;

  if (!radios[3].checked) acertado = false;
  CompruebaAcertado(acertado, error2);
};

CompruebaCombo = () => {
  let combo = document.getElementById("select");
  let acertado = true;

  if (combo.value != 3) acertado = false;
  CompruebaAcertado(acertado, error3);
};

CompruebaSuma = () => {
  let suma = document.getElementById("suma");
  let acertado = true;

  if (suma.value != "57") acertado = false;
  CompruebaAcertado(acertado, error4);
};

CompruebaAcertado = (acertado, parrafoError) => {
  if (acertado == false) {
    parrafoError.innerHTML = "X";
    contadorAcertados--;
  } else {
    contadorAcertados++;
    acierto += 25;
    parrafoError.innerHTML = "";
  }
};
