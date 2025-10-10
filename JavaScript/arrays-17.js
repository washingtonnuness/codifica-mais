/*
    17.Criar um array vazio, preenche-los com números de 1 a 100 e somar apenas os
    números pares. Depois disso, exibir o resultado (retorno 2550).
 */

let array100 = [];
let soma = 0;
let somaA = 0;
let somaF = 0;
for (i = 0; i <= 100; i++) {
  array100.push(i);
}

console.log("Usando for");
for (n = 1; n < array100.length; n++) {
  soma = soma + array100[n];
}
console.log("Total", soma);
console.log("\n");

console.log("Usando forEach");
// Recebe um callback com 2 paramentros.
array100.forEach((valor, indice) => {
  if (valor % 2 == 0) {
    somaA += valor;
  }
});

console.log("Valores de Numeros Par Total", somaA);
console.log("\n");

console.log("Usando filter");
const arrayPar = array100.filter((numero) => {
  return numero % 2 == 0;
});

console.log("Array de Numeros Par", arrayPar);
