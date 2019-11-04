<?php

    class Connect {
        
<<<<<<< Updated upstream
       var $host    = "localhost";        
       var $usuario = "root";        
       var $senha   = "";        
       var $banco   = "liomagazine";        
       var $query = null;
       var $mysqli = null;
=======
        var $host    = "localhost";        
        var $usuario = "root";        
        var $senha   = "";        
        var $banco   = "liomagazine";        
        var $mysqli;
>>>>>>> Stashed changes

        public function connect() {
            $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        }

        public function disconnect() {
            $this->mysqli->close();
        }
<<<<<<< Updated upstream

=======
        
>>>>>>> Stashed changes
    }
    
?>