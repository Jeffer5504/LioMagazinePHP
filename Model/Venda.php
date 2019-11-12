<?php

// Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
class Venda extends Conexao{
    
    //cria variaveis privadas para alocação de classe do venda.
    private $email;
    private $produto;
    private $idCliente;
    private $idProduto;
    private $preco;
    private $quantidade;
    private $desconto;
    private $subtotal;
    private $total;
    private $obs;
    private $data;
    private $dbQuantidade;
    private $dbSubtotal;

    //Herança da classe método buscando os camos e informaçõs da tabela no banco de dados.
    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        $this->disconecta();
    }
    // Métodos Get e Set para pega e inserção de dados feitos nesta classe.
      public function setPreco($preco) {
        $this->preco= $preco;
      }

      public function getQuantidade() {
        return $this->quantidade;
      }
    
      public function setQuantidade($quantidade) {
        $this->quantidade= $quantidade;
      }

      public function getDesconto() {
        return $this->desconto;
      }
      
      public function setDesconto($desconto) {
        $this->desconto= $desconto;
      }
      public function getSubtotal() {
        return $this->subtotal;
      }
      
      //calcula o subtotal do produto com a quantidade.
      public function setSubtotal() {
        $this->subtotal = $this->quantidade * $this->dbSubtotal;
      }
      public function getTotal() {
        return $this->total;
      }
      
      //faz o calculo do total com a porcentagem de desconto aplicado.
      public function setTotal() {
        $this->total = $this->subtotal - ($this->subtotal * ($this->desconto/100)); 
      }
      public function getObs() {
        return $this->obs;
      }
      
      public function setObs($obs) {
        $this->obs= $obs;
      }
      public function getData() {
        return $this->data;
      }
      
      public function setData($data) {
        $this->data= $data;
      }
      //faz uma estrutura de condifional de se para falar ao programa que se a quantidade for maior que a quantidade ele retorna o valor dela por ela mesma para evitar bugs.
      public function getdbQuantidade() {
        if ($this->dbQuantidade >= $this->quantidade){
            return $this->dbQuantidade - $this->quantidade;
        }else{
            return $this->dbQuantidade;
        }
      }
      
      public function setdbQuantidade($dbQuantidade) {
        $this->dbQuantidade= $dbQuantidade;
      }
      public function getdbSubtotal() {
        return $this->dbSubtotal;
      }
      
      public function setdbSubtotal($dbSubtotal) {
        $this->dbSubtotal= $dbSubtotal;
      }
    
}