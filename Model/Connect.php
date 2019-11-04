<?php

    class Connect {
        
        $host    = "localhost";        
        $usuario = "root";        
        $senha   = "";        
        $banco   = "liomagazine";        
        $mysqli;

        public function connect() {
            $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        }

        public function disconnect() {
            $this->mysqli->close();
        }
    }
    
?>