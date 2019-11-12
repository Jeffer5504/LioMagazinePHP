<?php include_once('Conexao.php')?>
<?php

// Criação de uma classe, seguida de uma Herança do arquivo de conexão do banco de dados.
class Busca {
    
    // Cria um metodo publico para busca no banco de dados.
    public function busca($select, $busca){
    $conn = new Conexao();
        //Criação de uma estrutura de escolha para o campo select do metodo busca.
        switch($select){
         
            //Estrutura condicional, para selecionar as informações do cliente.
            case "CLIENTE":

                //Herança da classe método buscando os camos e informaçõs da tabela no banco de dados.
                $conn->conecta();
                $query="SELECT cliente,email,telefone FROM cliente WHERE cliente like '%".$busca."%'";
                $conn->query = $conn->mysqli->query($query);

                //Cria as Linhas de array para armazenar os campos obtidos como resultado da busca.            
                $dbArray = mysqli_fetch_array($conn->query);
                $cliente = $dbArray[0];
                $email = $dbArray[1];
                $telefone = $dbArray[2];
                
                //impressão das informações na tela. 
                echo '<label>Nome: </label>'.$cliente.'</br>';
                echo '<label>Email: </label>'.$email.'</br>';
                echo '<label>Telefone: </label>'.$telefone.'</br>';

                //finalização da conexão com banco.
                exit();
                $conn->disconecta();

            ;break;

            //Estrutura condicional, para selecionar as informações do produto.
            case "PRODUTO":
            
                //Herança da classe método buscando os camos e informaçõs da tabela no banco de dados.
                $conn->conecta();
                $query="SELECT nome, descricao, preco, quantidade, dataP FROM produto WHERE nome LIKE '%".$busca."%'";
                $conn->query = $conn->mysqli->query($query);
                
                //Cria as Linhas de array para armazenar os campos obtidos como resultado da busca.
                $dbArray = mysqli_fetch_array($conn->query); 
                $nome = $dbArray[0];
                $descricao = $dbArray[1];
                $preco = $dbArray[2];
                $quantidade = $dbArray[3];
                $data = $dbArray[4];
                
                //estrutura condicional para, faz com que os produtos mostrados se repitam até suas quantias.
                //  for ($i=0; $i <= 5; $i++) { 
                //     echo '<label style="">Nome: </label>'.$dbArray[$i].'<br>';
                // }

                echo '<label>Nome: </label>'.$nome.'</br>';
                echo '<label>Descrição: </label>'.$descricao.'</br>';
                echo '<label>Preço: </label>'.$preco.'</br>';
                echo '<label>Quantidade: </label>'.$quantidade.'</br>';
                echo '<label>Data: </label>'.$data.'</br>'.'</br>';

                //finaliza conexão com banco de dados.
                exit();
                $conn->disconecta();

            ;break;

            //Estrutura condicional, para selecionar as informações do produto.
            case "VENDA":
            
                //Herança da classe método buscando os camos e informaçõs da tabela no banco de dados.
                $conn->conecta();
                $query="SELECT * FROM venda WHERE datav LIKE '%".$busca."%'";
                $conn->query = $conn->mysqli->query($query);

                //Estrutura condicional para repetição do metodo while de impressão das imformações.
                while ($result=mysqli_fetch_array($conn->query)) {
                    echo '<label>Id Venda:   </label>' . $result['idVenda']     .'</br>';
                    echo '<label>Cliente:    </label>' . $result['idCliente']   .'</br>';
                    echo '<label>Produto:    </label>' . $result['idProduto']   .'</br>';
                    echo '<label>Quantidade: </label>' . $result['quantidade']  .'</br>';
                    echo '<label>Subtotal:   </label>' . $result['subtotal']    .'</br>';
                    echo '<label>Total:      </label>' . $result['total']       .'</br>';
                    echo '<label>Observação: </label>' . $result['obs']         .'</br>';
                    echo '<label>Data:       </label>' . $result['datav']       .'</br>';
                    echo '</br>';} 
                
                //finaliza conexão com banco de dados.
                exit();
                $conn->disconecta();

            ;break;
           }
        }
    }

?>