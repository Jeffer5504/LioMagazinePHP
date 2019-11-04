<?php

    class Connect {
        
       var $host    = "localhost";        
       var $usuario = "root";        
       var $senha   = "";        
       var $banco   = "liomagazine";        
       var $query = null;
       var $mysqli = null;

        public function connect() {
            $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        }

        public function disconnect() {
            $this->mysqli->close();
        }
    }
    
?>