/*
18.Criar um array pré-definido com números 0 a 10, usar um array auxiliar para
invertê-lo e armazenar os números. Imprimi-los invertidos (bônus: criar uma
função chamada inverterArray() que recebe um array como parâmetro e o
retorna-o invertido)
*/

let array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let arrayInvert = [];
let arrayFunc = [];

console.log(arrayInvert);

array.forEach((valor, indice) => {
  console.log("Indice: ", indice, " Valor: ", valor);
});

for (let i = 9; i >= 0; i--) {
  //console.log(array[i]);
  arrayInvert.push(array[i]);
}
console.log("Array invertido !");
console.log(arrayInvert);

//Parte 2 função.

const inverterArray = (param) => {
  for (let i = 9; i >= 0; i--) {
    //console.log(array[i]);
    arrayFunc.push(param[i]);
  }
  return arrayFunc;
};

console.log("Retornando via função !!!");
console.log(inverterArray(array));
