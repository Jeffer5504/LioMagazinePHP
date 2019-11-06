<?php

class Cbusca extends Conexao{


    public function busca($select,$busca){
        
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
           
           echo '<label>Nome: </label>'.$nome.'</br>';
           echo '<label>Descrição: </label>'.$descricao.'</br>';
           echo '<label>Preço: </label>'.$preco.'</br>';
           echo '<label>Quantidade: </label>'.$quantidade.'</br>';
           echo '<label>Data: </label>'.$data.'</br>'.'</br>';

           $this->disconecta();
            
            ;break;
           }
        }
    }

