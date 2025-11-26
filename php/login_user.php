<?php
    include("conexao.php");
    $email_form = $_POST['email'];
    $senha_form = $_POST['senha'];


    $select = "SELECT * from user where email = '$email_form'";
    $query = $conexao->query($select);

    $resultado = $query->fetch_assoc();

    $email_banco = $resultado['email'];
    $senha_banco = $resultado['senha'];

    print_r($email_form, $senha_form);
    print_r($email_banco, $senha_banco);
?>