<?php

// Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
class Produto extends Conexao {

    //cria variaveis privadas para alocação de classe do produto.
    private $produto;
    private $descricao;
    private $quantidade;
    private $preco;
    private $desconto;
    private $data;

    //metodo publico para construção dos campos contido nos banco de dados.
    public function __construct($produto, $descricao, $quantidade, $preco, $desconto, $data) {
        $this->produto    = $produto;
        $this->descricao  = $descricao;
        $this->quantidade = $quantidade;
        $this->preco      = $preco;
        $this->desconto   = $desconto;
        $this->data       = $data;
        $this->setDescricao();
        $this->setData();
        $this->insert();
    }

    //metodo publico de set para inserir a descrição.
    public function setDescricao(){
        if ($this->descricao == NULL) {
            $this->descricao == "Sem descrição";
        }
    }   

    //metodo publico de set para inserir data e o formato.
    public function setData(){
        if ($this->data == NULL) {
            $this->data = date("d/m/Y");
        } else {
            // ! FORMATAR DATA AQUI
        }
    }


    //meotodo publico get pegar o produto do banco e instanciar na classe.
    public function getProduduto(){
        return $this->produto;
    }

    //metodo publico de set para inserir o produto
    public function setProduto($produto){
        $this->produto = $produto;
    }

    //metoro publico com a função de inserir os dados da classe dentro do banco de dados.
    public function insert(){
        $this->conecta();

        $this->query ="INSERT INTO produto (nome,descricao,preco,quantidade,desconto,datap) VALUES ('$this->produto','$this->descricao','$this->preco','$this->quantidade','$this->desconto','$this->data')";

        $this->mysqli->query($this->query);
        $this->disconecta();
    }


}