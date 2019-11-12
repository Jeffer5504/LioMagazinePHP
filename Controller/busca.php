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

        <?php include "../Model/Conexao.php";?>
        <?php include "../Model/Busca.php";?>
        <?php
            $select = filter_input(INPUT_POST, 'select',  FILTER_SANITIZE_STRING);
            $busca  = filter_input(INPUT_POST, 'busca',   FILTER_SANITIZE_STRING);

            $bus = new Busca($select, $busca);
            $bus -> busca($select, $busca);
        ?>

        <a href="../View/inicio.html" style="font-size:18pt; color:black;" >Voltar</a>
    </section>
</body>
</html>

