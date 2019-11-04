<?php

    class User {
        
        public function logar($usuario, $senha) {
            include "Connect.php";
            $con = new Connect();
            $con->connect(); 

            $sql = "SELECT usuario,senha FROM login_adm WHERE usurio = '$usuario'";
            $query = $con->mysqli->query($sql);

            $con->disconnect();

            $dbArray = mysqli_fetch_array($query);
            $dbUsuario = $dbArray[0];
            $dbSenha   = $dbArray[1];

            if ($dbUsuario == $usuario && $dbSenha == $senha) {
                echo "logado";
                echo $dbUsuario;
                echo $dbSenha;
                var_dump ($query);
            } else {
                echo "nao logado";
            }
           
        }

    }

?>