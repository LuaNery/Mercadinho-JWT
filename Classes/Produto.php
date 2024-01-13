<?php
class Produto{
public $cont;
public $nome;
public $preco;
public $quantidade;

/*Função que define o número máximo de produtos.*/
public function __construct(){
    $this->nome = array_fill(0, 1000, null);
    $this->preco = array_fill(0, 1000, 0.0);
    $this->quantidade = array_fill(0, 1000, 0);
    $this->cont = 0;
}

/*Função que cadastra o produto. Primeiro é feita a checagem do número de produtos já cadastrados. 
Também é feita a checagem do número parâmetros passados. Caso não tenha alcançado o limite de produtos
e os parâmetros estejam corretos, o cadastro é realizado.
. */
public function setProduto($data) {
    if ($this->cont == count($this->nome)) {
        echo "Atingiu sua quantidade máxima de itens.\n";
    } else {
        if (count($data) == 3) {
            $this->nome[$this->cont] = $data[0];
            $this->preco[$this->cont] = (float) $data[1];
            $this->quantidade[$this->cont] = (int) $data[2];
            $this->cont++;
            echo "Produto cadastrado com sucesso!\n";
        } else {
            echo "Erro ao cadastrar produto.\n";
        }
    }
}

/*Função que exibe na tela o último produto cadastrado com sucesso.*/
public function getProduto() {
    echo "Produto mais recente cadastrado: \n";
    echo "* Nome: " . $this->nome[$this->cont - 1] . "\n";
    echo "* Preço: R$" . $this->preco[$this->cont - 1] . "\n";
    echo "* Quantidade: " . $this->quantidade[$this->cont - 1] . " unidades\n";
}

/*Função que altera a quantidade do estoque do produto vendido.*/
public function setQuantidade($i, $quantidade){
    $this->quantidade[$i] = $quantidade;
}

/*Função que retorna o número de produtos cadastrados.*/
public function getCont() {
    return $this->cont;
}

/*Função que retorna o nome do produto cadastrado.*/
public function getNome($i) {
    return $this->nome[$i];
}

/*Função que retorna o preço do produto cadastrado.*/
public function getPreco($i) {
    return $this->preco[$i];
}

/*Função que retorna a quantidade de estoque do produto cadastrado.*/
public function getQuantidade($i) {
    return $this->quantidade[$i];
}

/*Fução de teste. Exibe todos os produtos cadastrados.

    public function printList() {
    $result = "Total de Produtos Cadastrados = " . $this->cont . "\n";
    for ($i = 0; $i < $this->cont; $i++) {
        $result .= ($i . " => " . $this->lista($i) . "\n");
    }
    echo $result;
}*/

/*Função que retorna as informações do produto cadastrado.*/
public function lista($i) {
    return "Produto: " . $this->nome[$i] . ", Preco: " . $this->preco[$i] . ", Quantidade: " . $this->quantidade[$i];
}
}
?>