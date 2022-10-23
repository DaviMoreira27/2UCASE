let sedexValue = document.getElementById("sedex-value");
let sedexPrazo = document.getElementById("sedex-prazo");

let pacValue = document.getElementById("pac-value");
let pacPrazo = document.getElementById("pac-prazo");

let sedexInput = document.getElementById("sedex-cod");
let pacInput = document.getElementById("pac-cod");


//WORKING: ENVIAR O FRETE E O CODIGO DO FRETE JUNTOS

function freteCalc(cep) {

    let data = JSON.stringify(cep);
    let url = "../../model/CEP.php?cep=" + cep;
    let dataResponse = [];

    fetch(url, {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((response) => {
        dataResponse = response;
          let sedexObject = dataResponse[1]['Codigo'];
          let sedexObjectV = dataResponse[1]['Valor'];

          let pacObject = dataResponse[0]['Codigo'];
          let pacObjectV = dataResponse[0]['Valor'];

          sedexInput.value = sedexObject + " " + sedexObjectV;
          pacInput.value = pacObject + " " + pacObjectV;


          sedexValue.innerText = "R$ " + dataResponse[1]['Valor'];
          pacValue.innerText = "R$ " + dataResponse[0]['Valor'];

          sedexPrazo.innerText = dataResponse[1]['PrazoEntrega'] + " Dias Úteis";
          pacPrazo.innerText = dataResponse[0]['PrazoEntrega'] + " Dias Úteis";

      })
      .catch((error) => console.log(error));
}