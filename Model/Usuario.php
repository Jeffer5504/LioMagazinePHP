<?php
 
    // Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
    class Usuario extends Conexao {
        
        //cria metodo publico para validar informaçõas com o banco
        public function logar($usuario,$senha) {

            //Herança da classe método buscando os camos e informaçõs da tabela no banco de dados.
            $this->conecta();
            $query= "SELECT usuario,senha FROM login_adm WHERE usuario = '$usuario'";
            $this->query = $this->mysqli->query($query);
        
            //Cria uma Linha de array para armazenar o campo obtido na query.
            $dbArray = mysqli_fetch_array($this->query);

            //esturura condicional de if para comparar as informações contidas no banco de dados e as redirecionando caso esteja errado ou certo.
            if ($usuario == $dbArray[0] && $senha == $dbArray[1]) {
                header('Location: ../View/inicio.html');
            } else {
                header('Location: ../View/index.html');
            }
        }

    }

?>