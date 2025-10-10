const prompt = require("prompt-sync");

/**
    16.Atribuir os números de 1 a 100 em um array e, posteriormente, somá-los
    (retorno 5050)

 */
let array100 = [];
let soma = 0;

for (i = 0; i <= 100; i++) {
  array100.push(i);
}

for (n = 1; n < array100.length; n++) {
  soma = soma + array100[n];
}
console.log("Resultado Array sem forEach");
console.log(\n);

console.log("Array forEach");
// Recebe um callback com 2 paramentros.
array100.forEach((valor, indice) => {
  somaA += valor;
});

console.log("Resultado Array.forEach");
console.log("Total", somaA);
