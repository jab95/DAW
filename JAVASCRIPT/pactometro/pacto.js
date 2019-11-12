let json = `[
    {
        "partido" : "PSOE",
        "escanios" : 120,
        "votos" : 6752983,
        "porcentaje" : 28,
        "color" : "#ed1c24"
    },
    {
        "partido" : "PP",
        "escanios" : 88,
        "votos" : 5019869,
        "porcentaje" : 20.82,
        "color" : "#0055a7"
    },
    {
        "partido" : "Cs",
        "escanios" : 10,
        "votos" : 1637540,
        "porcentaje" : 6.79,
        "color" : "#fa5000"
    },
    {
        "partido" : "PODEMOS-IU",
        "escanios" : 35,
        "votos" : 3097185,
        "porcentaje" : 12.84,
        "color" : "#6a2e68"
    },
    {
        "partido" : "VOX",
        "escanios" : 52,
        "votos" : 3640063,
        "porcentaje" : 15.09,
        "color" : "#66bc29"
    },
    {
        "partido" : "ERC-SOBIRANISTES",
        "escanios" : 13,
        "votos" : 869934,
        "porcentaje" : 3.61,
        "color" : "#f3b217"
    },
    {
        "partido" : "JxCAT-JUNTS",
        "escanios" : 8,
        "votos" : 527375,
        "porcentaje" : 2.19,
        "color" : "#c40048"

    },
    {
        "partido" : "PNV",
        "escanios" : 7,
        "votos" : 377423,
        "porcentaje" : 1.57,
        "color" : "#009526"
    },
    {
        "partido" : "EH Bildu",
        "escanios" : 5,
        "votos" : 276519,
        "porcentaje" : 1.15,
        "color" : "#92aa34"
    },
    {
        "partido" : "CUP-PR",
        "escanios" : 2,
        "votos" : 244754,
        "porcentaje" : 1.01,
        "color" : "#fff200"
    },
    {
        "partido" : "MÁS PAÍS",
        "escanios" : 3,
        "votos" : 554066,
        "porcentaje" : 2.3,
        "color" : "#0fddc4"
    },
    {
        "partido" : "NA+",
        "escanios" : 2,
        "votos" : 98448,
        "porcentaje" : 0.41,
        "color" : "#e51c13"
    },
    {
        "partido" : "CCa-PNC-NC",
        "escanios" : 2,
        "votos" : 123981,
        "porcentaje" : 0.51,
        "color" : "#ffda1a"
    },
    {
        "partido" : "BNG",
        "escanios" : 1,
        "votos" : 119597,
        "porcentaje" : 0.5,
        "color" : "#76aad0"
    },
    {
        "partido" : "PRC",
        "escanios" : 1,
        "votos" : 68580,
        "porcentaje" : 0.28,
        "color" : "#00c6a4"
    },
    {
        "partido" : "¡TERUEL EXISTE!",
        "escanios" : 1,
        "votos" : 19696,
        "porcentaje" : 0.08,
        "color" : "#037252"
    }
]`;

let arrayJSON = [];
let pactometroColor = null;
let total = null;
let checkboxes = null;

Main = () => {
  convierteJSON();

  arrayJSON.sort((a, b) => parseFloat(b.escanios) - parseFloat(a.escanios));

  document.getElementsByClassName("contenido")[0].innerHTML = CreaTabla();

  checkboxes = document.getElementsByName("cb");
  total = document.getElementById("total");
  pactometroColor = document.getElementsByClassName("pactometroColor")[0];
};

function convierteJSON() {
  json = JSON.parse(json);

  //recibimos el JSON de la web en forma de string, ahora lo convertimos a array;

  arrayJSON = json.map(function(elemento) {
    return {
      partido: elemento.partido,
      escanios: elemento.escanios,
      votos: elemento.votos,
      porcentaje: elemento.porcentaje,
      color: elemento.color
    };
  });
}

CreaTabla = () => {
  tabla = '<table border="1">';

  for (let index = 0; index < arrayJSON.length; index++) {
    tabla += "<tr>";
    tabla += `<td><input type="checkbox" name="cb" id="cb${index}" onclick="ClickCheckbox()"></td>`;
    tabla += `<td style="background: ${arrayJSON[index].color};"></td>`;
    tabla += `<td>${arrayJSON[index].partido}</td>`;
    tabla += `<td>${arrayJSON[index].escanios}</td>`;
    tabla += `<td>${arrayJSON[index].votos}</td>`;
    tabla += `<td>${arrayJSON[index].porcentaje}</td>`;
    tabla += "</tr>";
  }

  tabla += "</tabla>";

  return tabla;
};

ClickCheckbox = () => {
  let sumaTotal = 0;
  pactometroColor.innerHTML = "";

  for (let index = 0; index < arrayJSON.length; index++) {
    if (checkboxes[index].checked == true) {
      sumaTotal += arrayJSON[index].escanios;
      pactometroColor.innerHTML += `<span style="width: ${arrayJSON[index].escanios}px; height: 50px;background: ${arrayJSON[index].color}"></span>`;
    }
  }

  sumaTotal >= 179
    ? (total.style.color = "green")
    : (total.style.color = "black");

  total.innerHTML = "Total: " + sumaTotal;
};

addEventListener("load", Main);
