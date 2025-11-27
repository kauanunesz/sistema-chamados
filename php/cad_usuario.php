<?php

include 'conexao.php';

    $nome = isset($_POST['nome']);
    $email = isset($_POST['email']);
    $senha = isset($_POST['senha']);
    $confirmarSenha = isset($_POST['confirmarSenha']);
    $telefone = isset($_POST['telefone']);
    $setor = isset($_POST['setor']);

    if ($senha !== $confirmarSenha)
    {
        echo "<script>
        alert('Senhas não coincidem. Tente novamente!');
        window.history.back();
        </script>";
        exit;
    }
    
    echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    

    $insert = "INSERT INTO user values (null, '$nome', '$email', '$senha_hash', '$telefone', '$setor')";
    
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