<?php

class Venda extends Conexao{
    
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

    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        $this->disconecta();
    }
      
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
      
      public function setSubtotal() {
        $this->subtotal = $this->quantidade * $this->dbSubtotal;
      }
      public function getTotal() {
        return $this->total;
      }
      
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