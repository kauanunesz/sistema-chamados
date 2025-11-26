<?php

include 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $celular = $_POST['celular'];
    $setor = $_POST['setor'];

    if ($senha !== $confirmarSenha) 
    {
        echo "<script>
        alert('Senhas não coincidem. Tente novamente!');
        window.history.back();
        </script>";
        exit;
    }
    
    $insert = "INSERT INTO user values (null, '$nome', '$email', '$senha', '$celular', '$setor')";
    
    $query = $conexao->query($insert);

    if ($query)
    {    
        echo "<script> 
        alert ('Usuário cadastrado com sucesso!');
        location.href='../index.php';
        </script>";
    }
    else
    {
        echo "<script> 
        alert ('Erro ao cadastrar');
        </script>";
    }
    
    //função para inserir os dados do usario
    
    
?>