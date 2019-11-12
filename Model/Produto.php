<?php

class Produto extends Conexao {

    private $produto;
    private $descricao;
    private $quantidade;
    private $preco;
    private $desconto;
    private $data;

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

    public function setDescricao(){
        if ($this->descricao == NULL) {
            $this->descricao == "Sem descrição";
        }
    }   

    public function setData(){
        if ($this->data == NULL) {
            $this->data = date("d/m/Y");
        } else {
            // ! FORMATAR DATA AQUI
        }
    }


    
    public function getProduduto(){
        return $this->produto;
    }

    public function setProduto($produto){
        $this->produto = $produto;
    }

    public function insert(){
        $this->conecta();

        $this->query ="INSERT INTO produto (nome,descricao,preco,quantidade,desconto,datap) VALUES ('$this->produto','$this->descricao','$this->preco','$this->quantidade','$this->desconto','$this->data')";

        $this->mysqli->query($this->query);
        $this->disconecta();
    }


}