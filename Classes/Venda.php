<?php

require_once "Produto.php";

/*Classe Venda herda atributos da classe Produto.*/
class Venda extends Produto{
    public $quantidadeDeVenda;
    public $desconto;
    public $indexProduto;
    public $contVenda;

    /*Função que inicializa as informações da venda.*/
    public function __construct() {
        parent::__construct();
        $this->indexProduto = array_fill(0, 1000, 0);
        $this->quantidadeDeVenda = array_fill(0, 1000, 0);
        $this->desconto = array_fill(0, 1000, 0.0);
        $this->contVenda = 0;
    }

    /*Função que registra a venda do produto. São feitas checagens antes do registro:
    1. Verifica se é possível incluir a venda (checa o número de itens); 
    2. Verifica se o produto está cadastrado;
    3. Verifica se tem quantidade suficiente no estoque; 
    4. Verifica se o desconto é válido;
    */
    public function setVenda($nome, $quantidadeDeVenda, $desconto) {
        if ($this->contVenda == count($this->indexProduto)) {
            echo "Atingiu sua quantidade máxima de venda.";
        } else {
            $i = $this->buscaProduto($nome);
            if ($i >= 0) {
                if ($quantidadeDeVenda <= $this->quantidade[$i]) {
                    if ($desconto <= $this->preco[$i]) {
                        parent::setQuantidade($i, parent::getQuantidade($i) - $quantidadeDeVenda);
                        $this->quantidadeDeVenda[$this->contVenda] = $quantidadeDeVenda;
                        $this->desconto[$this->contVenda] = $desconto;
                        $this->indexProduto[$this->contVenda] = $i;
                        $this->contVenda++;
                        echo "Venda cadastrada com sucesso!\n";
                    } else {
                        echo "Desconto inválido.\n";
                    }
                } else {
                    echo "Estoque insuficiente.\n";
                }
            } else {
                echo "Produto não cadastrado.\n";
            }
        }
    }

    /*Função que busca o produto na array pelo nome e retorna a posição do produto
    encontrado no cadastro de produtos. Caso não seja encontrado o produto, retorna -1.*/
    public function buscaProduto($nome) {
        for ($i = 0; $i < parent::getCont(); $i++) {
            if ($nome == parent::getNome($i)) {
                return $i;
            }
        }
        return -1;
    }

    /*Função que exibe as informações da última venda registrada com sucesso:
        1. Nome do produto;
        2. Preço do produto; 
        3. Desconto; 
        4. Quantidade vendida do produto;
        5.Quantidade do estoque atual do produto;*/
    public function getVenda() {
        echo "Última venda registrada: \n";
        $index = $this->indexProduto[$this->contVenda - 1];
        echo "* Nome: " . parent::getNome($index) . "\n";
        echo "* Preço: R$" . parent::getPreco($index) . "\n";
        echo "* Desconto: R$" . $this->desconto[$this->contVenda - 1] . "\n";
        echo "* Quantidade: " . $this->quantidadeDeVenda[$this->contVenda - 1] . " unidades\n";
        echo "* Estoque atual: " . parent::getQuantidade($index) . " unidades\n";
    }
}







?>