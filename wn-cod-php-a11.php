<?php


function exibirMenu()
{
    $estoque = [
        [
            "Codigo" => 1,
            "Nome" => "TESTE",
            "Tamanho" => 33,
            "Cor" => "AZUL",
            "Quantidade" => 12,
        ],
        [
            "Codigo" => 21,
            "Nome" => "TESTE 34",
            "Tamanho" => 22,
            "Cor" => "Laranja",
            "Quantidade" => 1,
        ]
    ];

    $continue = 0;

    while ($continue != 5) {
        echo ("Digite 1 - Cadastro de produtos." . PHP_EOL);
        echo ("Digite 2 - Venda de produtos." . PHP_EOL);
        echo ("Digite 3 - Pesquisar produtos." . PHP_EOL);
        echo ("Digite 4 - Lista todos." . PHP_EOL);


        $continue = strtoupper(readline(" Digite 5 para sair !!!" . PHP_EOL));

        if ($continue == 1) {
            echo ("CAiu aqui -> Cadastro de produtos .!" . PHP_EOL);
            //$estoque = strtoupper(readline(" Digite 5 para sair !!!" . PHP_EOL);
            $codigo = strtoupper(readline(" Digite codigo do produto !!!" . PHP_EOL));
            $nomeProduto = strtoupper(readline(" Digite Nome do produto!!!" . PHP_EOL));
            $tamanho = strtoupper(readline(" Digite tamanho do produto!!!" . PHP_EOL));
            $cor = strtoupper(readline(" Digite cor do produto!!!" . PHP_EOL));
            $quantidade = strtoupper(readline(" Digite quantidade do produto !!!" . PHP_EOL));
            adicionarProduto(
                $estoque,
                $codigo,
                $nomeProduto,
                $tamanho,
                $cor,
                $quantidade
            );
        } else if ($continue == 2) {
            echo ("CAiu aqui -> Venda de produtos" . PHP_EOL);
            $codigo = readline("Digite o codigo do item .!") . PHP_EOL;
            $quantidade = readline("Digite quantidade remover do item .!") . PHP_EOL;
            venderProduto($estoque, $codigo, $quantidade);
        } else if ($continue == 3) {
            echo ("CAiu aqui -> Pesquisar no estoque" . PHP_EOL);
            $codigo = readline("Digite o codigo do item .!") . PHP_EOL;
            verificarEstoque($estoque, $codigo);
        } elseif ($continue == 4) {
            echo ("CAiu aqui -> Lista todos itens estoque" . PHP_EOL);
            listarEstoque($estoque);
            echo "" . PHP_EOL;
        } else {
            echo ("Opcao invalido digite novamente !!!" . PHP_EOL);
        }
    }
}

function adicionarProduto(
    &$estoque,
    $codigo,
    $nomeProduto,
    $tamanho,
    $cor,
    $quantidade
) {


    $estoque[] = [
        "Codigo" => $codigo,
        "Nome" => $nomeProduto,
        "Tamanho" => $tamanho,
        "Cor" => $cor,
        "Quantidade" => $quantidade
    ];

    //    print_r($estoque);
    return $estoque;
}

function listarEstoque($estoque)
{
    print_r($estoque);
}


function verificarEstoque($estoque, $codigo)
{
    foreach ($estoque as $produto) {
        if ($produto["Codigo"] == $codigo) {
            echo "Produto disponivel no estoque !!!" . PHP_EOL;
            echo "Código do produto = " . $produto["Codigo"] . PHP_EOL;
            echo "Nome = " . $produto["Nome"] . PHP_EOL;
            echo "Tamanho = " . $produto["Tamanho"] . PHP_EOL;
            echo "Cor = " . $produto["Cor"] . PHP_EOL;
            echo "Quantidade = " . $produto["Quantidade"] . PHP_EOL;
        }
    }
}

function venderProduto($estoque, $codigo, $quantidade)
{
    foreach ($estoque as $produto) {
        if ($produto["Codigo"] == $codigo) {
            if ($produto["Quantidade"] > 0) {

                echo "Produto disponivel no estoque !!!" . PHP_EOL;
                echo "Código do produto = " . $produto["Codigo"] . PHP_EOL;
                echo "Nome = " . $produto["Nome"] . PHP_EOL;
                echo "Tamanho = " . $produto["Tamanho"] . PHP_EOL;
                echo "Cor = " . $produto["Cor"] . PHP_EOL;
                echo "Quantidade = " . $produto["Quantidade"] . PHP_EOL;
                $produto["Quantidade"] -= $quantidade;

                echo  PHP_EOL . "Produto atualizado. " . PHP_EOL;

                echo "Produto disponivel no estoque !!!" . PHP_EOL;
                echo "Código do produto = " . $produto["Codigo"] . PHP_EOL;
                echo "Nome = " . $produto["Nome"] . PHP_EOL;
                echo "Tamanho = " . $produto["Tamanho"] . PHP_EOL;
                echo "Cor = " . $produto["Cor"] . PHP_EOL;
                echo "Quantidade = " . $produto["Quantidade"] . PHP_EOL . PHP_EOL;
            }
        }
    }
}

exibirMenu();
