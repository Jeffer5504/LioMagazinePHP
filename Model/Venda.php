<<<<<<< HEAD
<?php

class Venda extends Conexao{

    public function insert($query){
        $this->conecta();
        $this->query = $this->mysqli->query($query);
        $this->disconecta();
    }
=======
<?php

class Venda extends Connect{

    public function insert($query){
        $this->connect();
        $this->query = $this->mysqli->query($query);
        $this->disconnect();
    }
>>>>>>> master
}