<?php

class Busca extends Conexao{

    public function busca($select, $busca){
        
        switch($select){

            case "CLIENTE":
            
                $this->conecta();
                $query="SELECT cliente,email,telefone FROM cliente WHERE cliente like '%".$busca."%'";
                $this->query = $this->mysqli->query($query);
            
                $dbArray = mysqli_fetch_array($this->query);
                $cliente = $dbArray[0];
                $email = $dbArray[1];
                $telefone = $dbArray[2];
                
                echo '<label>Nome: </label>'.$cliente.'</br>';
                echo '<label>Email: </label>'.$email.'</br>';
                echo '<label>Telefone: </label>'.$telefone.'</br>';
                exit();
                $this->disconecta();

            ;break;

            case "PRODUTO":
            
                $this->conecta();
                $query="SELECT nome, descricao, preco, quantidade, dataP FROM produto WHERE nome LIKE '%".$busca."%'";
                $this->query = $this->mysqli->query($query);
                
                $dbArray = mysqli_fetch_array($this->query); 
                $nome = $dbArray[0];
                $descricao = $dbArray[1];
                $preco = $dbArray[2];
                $quantidade = $dbArray[3];
                $data = $dbArray[4];
                
                for ($i=0; $i <= 5; $i++) { 
                    echo '<label style="">Nome: </label>'.$dbArray[$i].'<br>';
                }

                #echo '<label>Nome: </label>'.$nome.'</br>';
                #echo '<label>Descrição: </label>'.$descricao.'</br>';
                #echo '<label>Preço: </label>'.$preco.'</br>';
                #echo '<label>Quantidade: </label>'.$quantidade.'</br>';
                #echo '<label>Data: </label>'.$data.'</br>'.'</br>';
                exit();

                $this->disconecta();

            ;break;

            case "VENDA":
            
                $this->conecta();
                $query="SELECT * FROM venda WHERE datav LIKE '%".$busca."%'";
                $this->query = $this->mysqli->query($query);

                while ($result=mysqli_fetch_array($this->query)) {
                    echo '<label>Id Venda:   </label>' . $result['idVenda']     .'</br>';
                    echo '<label>Cliente:    </label>' . $result['idCliente']   .'</br>';
                    echo '<label>Produto:    </label>' . $result['idProduto']   .'</br>';
                    echo '<label>Desconto:   </label>' . $result['desconto']    .'</br>';
                    echo '<label>Quantidade: </label>' . $result['quantidade']  .'</br>';
                    echo '<label>Subtotal:   </label>' . $result['subtotal']    .'</br>';
                    echo '<label>Total:      </label>' . $result['total']       .'</br>';
                    echo '<label>Observação: </label>' . $result['obs']         .'</br>';
                    echo '<label>Data:       </label>' . $result['datav']       .'</br>';
                    echo '</br>';
                } exit();

                $this->disconecta();

            ;break;
           }
        }
    }

?>