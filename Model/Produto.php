<?php

class Produto extends Conexao{

    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        $this->disconecta();
      
        
        header('Location: ../View/inicio.html');
    }


}