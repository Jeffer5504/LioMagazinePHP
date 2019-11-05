<?php

class Venda extends Conexao{

    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        $this->disconecta();
    }
}