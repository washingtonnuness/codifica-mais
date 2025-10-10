const prompt = require("prompt-sync")({ sigint: true });

/*
19.Receber 5 idades, usar filter para retornar QUANTAS e QUAIS são maiores que
18

*/

let arrayIdade = [];

let contador = 5;

let array18up = [];

while (contador > 0) {
  arrayIdade.push(Number(prompt("Digite uma idade: ")));
  console.log("Repita o mais ", contador - 1);
  contador--;
}

console.log("Array completo: ", arrayIdade);

//Filter sempre recebe um callback com numero e retorna algo com condiçao true ou false
//sempre retornando um novo array sem alterar o original
const mairoIdade = arrayIdade.filter((numero) => {
  //   if (numero > 18) {
  //     mairoIdade.push(numero);
  //     console.log(numero);
  //   }
  return numero >= 18;
});

console.log("Array maior = 18 anos!!! ");
console.log(mairoIdade);

// const maiorIdadeFunc = (param) => {
//   const mairoIdade2 = param.filter((numero) => {
//     return numero >= 18;
//   });
//   return valor;
// };

const maiorIdadeFunc = (param) => {
  const mairoIdade2 = param.filter((numero) => {
    return numero >= 18;
  });
  array18up.push(mairoIdade2);
  return array18up;
};

console.log("Executando função !!");
console.log(maiorIdadeFunc(arrayIdade));
