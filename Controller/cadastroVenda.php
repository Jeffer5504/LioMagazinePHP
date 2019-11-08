<?php include "../Model/Conexao.php";?>
<?php include "../Model/Venda.php";?>
<?php
    // Variáveis finais do html
    $email      =  filter_input(INPUT_POST, 'email',      FILTER_SANITIZE_STRING);
    $produto    =  filter_input(INPUT_POST, 'produto',    FILTER_SANITIZE_STRING);
    $quantidade =  filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
    $obs        =  filter_input(INPUT_POST, 'obs',        FILTER_SANITIZE_STRING);
    $data       =  filter_input(INPUT_POST, 'data',       FILTER_SANITIZE_STRING);
    
    //Query para buscar o id do Cliente e atribuir a variável email.
    $conexao = new Conexao();
    $conexao->conecta();
    $sql1 = "SELECT idCliente FROM cliente WHERE email = '$email'";
    $conexao->query = $conexao->mysqli->query($sql1); 
    $dbArray = mysqli_fetch_array($conexao->query);
    $email = $dbArray[0];

    //Query para buscar o id do Produto e atribuir a variável produto.
    $conexao->conecta();
    $sql2 = "SELECT idProduto FROM produto WHERE nome = '$produto'";
    $conexao->query = $conexao->mysqli->query($sql2); 
    $dbArray = mysqli_fetch_array($conexao->query);
    $produto = $dbArray[0];
    //Query para cadastrar uma venda no banco de dados.
    $sql = "INSERT INTO venda (idCliente, idProduto,quantidade, subtotal, total, obs, datav) 
    VALUES ('$email','$produto','$desconto', '$quantidade', '0', '$obs','$data')";
    $venda = new Venda();
    $venda -> insert($sql);
    
    header ('LOCATION: ../View/inicio.html');
?>