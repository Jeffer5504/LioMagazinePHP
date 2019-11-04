<?php 
    // Variaveis finais do HTML
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Query para selecionar os campos usuario e senha do database login
    $sql = ("SELECT * FROM login_adm WHERE usuario = '$usuario'");
    