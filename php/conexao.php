<?php
    $server = "localhost";
    $user = "root";
    $password = "admin";
    $database = "db_chamados";
    
    $conexao = new mysqli($server, $user, $password, $database);

    if($conexao == false) {
        echo "falha na conexão";
    }
?>