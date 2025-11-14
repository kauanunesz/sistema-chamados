<?php
include ("conexao.php");

if ($_SERVER["REQUEST_METHOD" == "POST"])
{

    $nome = $_POST['nome'];
    $email =  $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha =  $_POST['confirma'];
    $celular =  $_POST['celular'];
    $setor =  $_POST['cargo'];
    if ($senha !== $confirmar_senha)
        {
            echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
            exit();
        }
        
    $insert = "INSERT INTO tb_user(null,'$nome','$email','$senha','$celular','$setor')"
    $stmt = $conexao->prepare($insert);
    $stmt->
}
?>