<?php
require 'Classes/Produto.php';
require 'Classes/Venda.php';

/*Cadastro de produtos utilizando a classe Produto.*/
$produto = new Produto();
$produto->setProduto(['Produto1', 2.99, 50]);
$produto->setProduto(['Produto2', 5.99, 30]);
$produto->setProduto(['Produto3', 7.99, 15]);

/*Exibe o último produto cadastrado com sucesso.*/
$produto->getProduto();

/*Exibe todos os produtos cadastrados.
$produto->printList();
*/

/*Inicializa cadastro de venda*/
$venda = new Venda();

/*Cadastra os produtos que serão vendidos.*/
$venda->setProduto(['Farinha', 2.99, 50]);
$venda->setProduto(['Feijão', 5.99, 30]);
$venda->setProduto(['Arroz', 7.99, 15]);

/*Cadastra as vendas.*/
$venda->setVenda("Farinha", 1, 3);
$venda->setVenda("Feijão", 40, 3);
$venda->setVenda("Arroz", 10, 5);

/*Exibe a última venda cadastrada com sucesso.*/
$venda->getVenda();

?>