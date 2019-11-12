<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lio Magazine</title>
    <link rel="stylesheet" href="../View/css/reset.css">
    <link rel="stylesheet" href="../View/css/config.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <script src="../View/js/all.js"></script>
</head>
<body>
    <section class="box" style="color:black;">

        <!-- Chama a busca pelos campos do banco de dados. -->
        <?php include "../Model/Busca.php";?>

        <!-- Criação da busca pelos tabelas do banco de dados e suas informações. -->
        <?php
            // Cria uma váriavel para selecionar pelo metodo 'POST' do busca.html e retorna os valores para entregar ao arquivo busca.php.
            $select = filter_input(INPUT_POST, 'select',  FILTER_SANITIZE_STRING);

            // Cria uma váriavel para busca pelo metodo 'POST' do busca.html e retorna os valores para entregar ao arquivo busca.php.
            $busca  = filter_input(INPUT_POST, 'busca',   FILTER_SANITIZE_STRING);

            // instancia uma classe de busca ods campos no banco de dados para busca dos dados inseridos.
            $bus = new Busca($select, $busca);

            // Busca as informações dentro do banco de dados e as seleciona.
            $bus -> busca($select, $busca);
        ?>

        <a href="../View/inicio.html" style="font-size:18pt; color:black;" >Voltar</a>
    </section>
</body>
</html>

