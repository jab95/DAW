var preguntas = [
  {
    pregunta: "Para insertar en una tabla",
    respuestas: ["ALTER", "INSERT", "UPDATE"],
    respuesta: 1
  },
  {
    pregunta: "Delete from tabla = truncate tabla?",
    respuestas: ["SI", "NO"],
    respuesta: 1
  },
  {
    pregunta: "Cual de los siguientes no es un comando DML",
    respuestas: ["INSERT", "SELECT", "UPDATE", "ALTER"],
    respuesta: 3
  }
];

preguntas.sort(function() {
  return 0.5 - Math.random();
});

function main() {
  var test = "";
  var btnComprobar = document.getElementById("btnComprobar");

  preguntas.forEach(function(elemento, indice) {
    var indice = 0;

    test += `<p>${indice + 1}º - ${elemento.pregunta} </p>`;
    elemento.respuestas.forEach(function(respuesta) {
      test += `<input type="radio" name="${elemento.pregunta}" value="${indice}" checked >${respuesta} </input>`;
      indice++;
    });
  });

  document.getElementById("contenedor").innerHTML = test;

  btnComprobar.onclick = function() {
    var inputs = document.getElementsByTagName("input");
    var j = 0;
    var aciertos = 0;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].checked) {
        if (inputs[i].value == preguntas[j].respuesta) aciertos++;
        j++;
      }
    }
    document.getElementById("aciertos").innerHTML =
      "Has acertado " + aciertos + " preguntas";
  };
}

addEventListener("load", main);
