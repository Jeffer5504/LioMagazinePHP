<?php include "../Model/User.php";?> 
<?php

    // Variaveis finais do HTML
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha   = filter_input(INPUT_POST, 'senha',   FILTER_SANITIZE_STRING);
    
    // Instancia a classe de usuario
    $user = new User();
    $user->logar($usuario, $senha);
