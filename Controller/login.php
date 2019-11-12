<?php include "../Model/Conexao.php";?>
<?php include "../Model/Usuario.php";?> 
<?php

    // Variaveis finais do HTML
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha   = filter_input(INPUT_POST, 'senha',   FILTER_SANITIZE_STRING);
  
    // Instancia a classe de usuario
    $user = new Usuario();
    $user->logar($usuario,$senha);
