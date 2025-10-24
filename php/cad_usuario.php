<?php
$nome = $_POST['nome'];
$email =  $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha =  $_POST['confirma'];
$celular =  $_POST['celular'];
$setor =  $_POST['cargo'];
print_r($_POST['nome']);

include 'conexao.php';
$insert = "INSERT INTO tb_user(null,'$nome','$email','$senha','$celular','$setor')"
?>