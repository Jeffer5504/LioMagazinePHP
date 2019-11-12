<?php include "../Model/Cliente.php";?>
<?php

    // Variáveis finais do html
    $cliente  = filter_input(INPUT_POST, 'cliente',  FILTER_SANITIZE_STRING);
    $email    = filter_input(INPUT_POST, 'email',    FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    
    // Query para cadastrar o cliente no banco de dados.
    $sql     =  "INSERT INTO cliente (cliente,email,telefone) VALUES ('$cliente','$email','$telefone')";
    $cliente =  new Cliente();
    $cliente -> insert($sql);

    header('Location: ../View/inicio.html');