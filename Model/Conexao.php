<?php

    class Conexao {
        
       var $host    = "localhost";        
       var $usuario = "root";        
       var $senha   = "";        
       var $banco   = "liomagazine";        
       var $query   = null;
       var $mysqli  = null;

        public function conecta() {
            $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        }

        public function disconecta() {
            $this->mysqli->close();
        }
    }
    
?>