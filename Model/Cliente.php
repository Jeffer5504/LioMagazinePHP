<?php

class Cliente extends Conexao{

    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        header('Location: ../View/inicio.html');
        $this->disconecta();

    }
}