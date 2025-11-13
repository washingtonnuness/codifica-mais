/**
 * 01 - Conversão de temperatura
Criar um código para conversão de temperatura entre Celsius e Fahrenheit.

Fórmulas:

F = (C * 9/5)+32

C = (F − 32) ∗ 5/9
* 
*/
const prompt = require("prompt-sync")({ sigint: true });

let celcios = Number(
  prompt("Digite o valor em Celcios para converter em Fahrenheit: ")
);

let fahrenheit = Number(
  prompt("Digite o valor em Fahrenheit para converter em Celcios: ")
);
let TF = celcios * (9 / 5) + 32;
let TC = (fahrenheit - 32) * (5 / 9);
console.log("Temperatura de Celcios X Fahrenheit: ", TF);
console.log("Temperatura de Fahrenheit X Celcios: ", TC);
