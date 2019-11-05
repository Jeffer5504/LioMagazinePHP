<?php
 
    class Usuario extends Conexao {
        
        public function logar($query,$usuario,$senha) {
           

            $this->conecta();
            $this->query =$this->mysqli->query($query);
            

            $dbArray = mysqli_fetch_array($this->query);
            $dbUsuario = $dbArray[0];
            $dbSenha   = $dbArray[1];

            if ($dbUsuario == $usuario && $dbSenha == $senha) {
                header('Location: ../View/inicio.html');
            } else {
                header('Location: ../View/index.html');
            }
           
        }

    }

?>