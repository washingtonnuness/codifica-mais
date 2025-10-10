/**
15.Solicitar 4 notas, armazená-las em um array e tirar a média. Verificar aprovação
(nota >= 6)
*/
const prompt = require("prompt-sync")({ sigint: true });

let aNotas = [];
let soma = 0;
let resultado = 0;
let contador = 1;

while (contador <= 4) {
  let nota = Number(prompt("Digite a nota " + contador + "ª do aluno: "));
  aNotas.push(nota);
  contador++;
}

aNotas.forEach((valor, indice) => {
  soma += valor;
});
result = soma / 4;

if (result >= 6) {
  console.log("Sua nota foi media ", result);
  console.log("Voce está aprovado");
} else {
  console.log("Não foi desta vez, Reprovado !!!");
}
