/*
20.Criar um array de arrays com 5 produtos pré-definidos (descritos abaixo) e
calcular o valor total da compra. Depois, aplicar um cupom de 20% de desconto
e mostrar o valor final. Ordem dos valores: [‘Nome’, ‘Preço’, ‘Quantidade’].
*/

let produtos = [
  ["Camisa", 44.9, 5],
  ["Bermuda", 69.9, 3],
  ["Tenis", 179.9, 2],
  ["Calça", 129.9, 2],
  ["Sapato", 239.9, 1],
];

let somaItens = 0;
let somaValor = 0;
let itens = 0;
let somaValorDesconto = 0;
let valorDesconto = 0;

const desconto = 0.2; // Valor 20 / 100 = 0,2% ;

console.log("Array original", produtos);

const produtosMap = produtos.map((produtos) => {
  produtos[1] = produtos[2] * produtos[1];
  somaValor += produtos[1];

  return produtos;
});

valorDesconto = somaValor * desconto;
somaValorDesconto = somaValor - valorDesconto;
console.log("Array Produto X valor", produtosMap);
console.log("Total da compra: R$", somaValor);
console.log("Valor de desconto (20% OFF): R$", valorDesconto);
console.log("Valor com desconto (20% OFF) aplicado: R$", somaValorDesconto);
