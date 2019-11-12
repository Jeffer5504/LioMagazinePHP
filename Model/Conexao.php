<?php

    // Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
    class Conexao {
        
        //cria campos variantes apara conexão com banco de dados.
        var $host    = "localhost";        
        var $usuario = "root";        
        var $senha   = "";        
        var $banco   = "liomagazine";        
        var $query   = null;
        var $mysqli  = null;

        //cria um metodo de conexão com banco.
        public function conecta() {
            $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        }

        //cria um metodo de desconexão com banco.
        public function disconecta() {
            $this->mysqli->close();
        }
    }
    
?>