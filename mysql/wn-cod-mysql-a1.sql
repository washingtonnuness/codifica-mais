CREATE SCHEMA `gestao_produtos`
DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

USE gestao_produtos;

CREATE TABLE produtos(
id INT(255) AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255),
descricao VARCHAR(255),
categoria VARCHAR(255),
preco DOUBLE,
peso DOUBLE,
quantidade INT(255),
fornecedor VARCHAR(255),
criado_em DATETIME NOT NULL,
atualizado_em DATETIME NULL,
deletado_em DATETIME NULL
);

CREATE TABLE fornecedores(
id INT(255) AUTO_INCREMENT PRIMARY KEY,
razao_social VARCHAR(255),
cnpj VARCHAR(14),
criado_em DATETIME NOT NULL,
atualizado_em DATETIME NULL,
deletado_em DATETIME NULL
);
