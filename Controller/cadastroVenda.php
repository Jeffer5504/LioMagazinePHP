<?php include "../Model/Conexao.php";?>
<?php include "../Model/Venda.php";?>
<?php
    // Variáveis finais do html
    $email      =  filter_input(INPUT_POST, 'email',      FILTER_SANITIZE_STRING);
    $produto    =  filter_input(INPUT_POST, 'produto',    FILTER_SANITIZE_STRING);
    $quantidade =  filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
    $desconto   =  filter_input(INPUT_POST, 'desconto',   FILTER_SANITIZE_STRING);
    $obs        =  filter_input(INPUT_POST, 'obs',        FILTER_SANITIZE_STRING);
    $data       =  filter_input(INPUT_POST, 'data',       FILTER_SANITIZE_STRING);
    
    //Query para cadastrar uma venda no banco de dados.
    $sql = "INSERT INTO venda (idCliente, idProduto, desconto, quantidade, subtotal, total, obs, datav) 
    VALUES ('6','10','$desconto', '$quantidade', '0', '0', '$obs','$data')";
    $venda = new Venda();
    $venda -> insert($sql);

    header ('LOCATION: ../View/inicio.html');
?>