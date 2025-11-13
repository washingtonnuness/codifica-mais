/**
 * 02 - Cálculo de IMC
Criar um código para calcular o Índice de Massa Corporal, recebendo dados de altura e peso.

Fórmula:

I
M
C
=
p
e
s
o
÷
a
l
t
u
r
a
2
 */

const prompt = require("prompt-sync")({ sigint: true });

let altura = Number(prompt("Digite a tua altura para calcular o IMC: "));

let peso = Number(prompt("Digite a teu peso para calcular o IMC: "));

let imcResultado = peso / (altura * altura);

console.log("Teu imc é de : ", imcResultado);
