<?php
//Incluindo arquivo de conexão.
include "../Model/Connect.php";
include "../Model/Client.php";

//Variáveis finais do html
$client = $_POST['cliente'];
$email = $_POST['email'];
$phone = $_POST['telefone'];

//Query para cadastrar o cliente no banco de dados.
$sql ="INSERT INTO cliente (cliente,email,telefone)VALUES('$client','$email','$phone')";
$client = new Client();
$client->insert($sql);

