let numAAdivinar = 0;
let mensaje = null;
let limiteDerecho = 100;
let limiteIzquierdo = 1;

main = () => {
  document
    .getElementById("btnComprobar")
    .addEventListener("click", ComprobarNumero, false);
  mensaje = document.getElementById("mensaje");
  numAAdivinar = Math.round(Math.random() * (100 - 1) + parseInt(1));
};

ComprobarNumero = () => {
  let inputNumero = document.getElementById("numero").value;

  if (inputNumero.length != 0) {
    if (inputNumero <= 100 && inputNumero > 0) {
      mensaje.innerHTML = "";
      if (inputNumero != numAAdivinar) {
        if (inputNumero < numAAdivinar)
          mensaje.innerHTML =
            "El numero secreto esta entre " +
            (parseInt(inputNumero) + 1) +
            " y 100";
        else
          mensaje.innerHTML =
            "El numero secreto esta entre " +
            (parseInt(inputNumero) - 1) +
            " y 1";
      } else {
        mensaje.innerHTML = "Enhorabuena, has acertado el numero secreto!!";
      }
    } else mensaje.innerHTML = "El numero debe estar comprendido entre 1 y 100";
  } else {
    mensaje.innerHTML = "Debe estoducir un numero";
  }
};

window.addEventListener("load", main, false);
