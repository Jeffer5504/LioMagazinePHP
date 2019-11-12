<?php
 
    class Usuario extends Conexao {
        
        public function logar($usuario,$senha) {
            $this->conecta();
            $query= "SELECT usuario,senha FROM login_adm WHERE usuario = '$usuario'";
            $this->query = $this->mysqli->query($query);
        
            $dbArray = mysqli_fetch_array($this->query);

            if ($usuario == $dbArray[0] && $senha == $dbArray[1]) {
                header('Location: ../View/inicio.html');
            } else {
                header('Location: ../View/index.html');
            }
        }

    }

?>