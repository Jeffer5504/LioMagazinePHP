<?php
     
    include "../Model/Connect.php";
    include "../Model/Venda.php";

    //Variáveis finais do html
    $email       =  filter_input(INPUT_POST, 'email',      FILTER_SANITIZE_STRING);
    $produto     =  filter_input(INPUT_POST, 'produto',    FILTER_SANITIZE_STRING);
    $nome        =  filter_input(INPUT_POST, 'nome',       FILTER_SANITIZE_STRING);
    $desconto    =  filter_input(INPUT_POST, 'desconto',   FILTER_SANITIZE_STRING);
    $obs         =  filter_input(INPUT_POST, 'obs',        FILTER_SANITIZE_STRING);
    $quantidade  =  filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
    $data        =  filter_input(INPUT_POST, 'data',       FILTER_SANITIZE_STRING);
    
    //Query para cadastrar uma venda no banco de dados.
    $sql ="INSERT INTO venda (email,nome,desconto,obs,quantidade,data)VALUES('$email','$nome','$desconto','$obs','$quantidade','$data')";
    $Venda = new Venda();
    $venda->insert($sql);

?>