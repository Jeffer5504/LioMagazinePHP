<?php
    //Incluindo arquivo de conexão.
    include "../Model/Connect.php";
    include "../Model/Produto.php";

    //Variáveis finais do html
    $produto  = filter_input(INPUT_POST, 'produto',  FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao',    FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
    $desconto = filter_input(INPUT_POST, 'desconto', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    
    //Query para cadastrar o cliente no banco de dados.
    $sql ="INSERT INTO produto (nome,descricao,preco,quantidade,desconto,dataP)VALUES('$produto','$descricao','$preco','$quantidade','$desconto','$data')";
    $produto = new Produto();
    $produto->insert($sql);

