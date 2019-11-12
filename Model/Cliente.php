<?php include_once('Conexao.php')?>
<?php

class Cliente {

    // Cria um metodo publico para inserir dados no banco de dados.
    public function insert($query){
        $conn = new Conexao();
        $conn->conecta();
        $conn->query =$conn->mysqli->query($query);
        $conn->disconecta();
    }

}