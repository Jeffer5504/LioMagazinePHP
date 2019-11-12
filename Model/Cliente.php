<?php

// Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
class Cliente extends Conexao{

    // Cria um metodo publico para inserir dados no banco de dados.
    public function insert($query){

        //conexão com banco de dados através da herança.
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        header('Location: ../View/inicio.html');
        $this->disconecta();

    }
}