<?php include "../Model/Conexao.php";?>
<?php include "../Model/Produto.php";?>
<?php 
    //Variáveis finais do html
    $produto    = $_POST["produto"];
    $descricao  = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco      = $_POST["preco"    ];
    $desconto   = $_POST["desconto" ];
    $data       = $_POST["data"  ];
    
    //Query para cadastrar o cliente no banco de dados.
    $sql ="INSERT INTO produto (nome,descricao,preco,quantidade,desconto,datap) VALUES ('{$produto}','{$descricao}','{$preco}','{$quantidade}','{$desconto}','{$data}')";
    $produto = new Produto();
    $produto -> insert($sql);
