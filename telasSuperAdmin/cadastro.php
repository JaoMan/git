<?php 
session_start();
include_once("proc/conexao.php");


$nome = filter_input(INPUT_POST, 'nome' ,FILTER_SANITIZE_STRING);

$email = filter_input(INPUT_POST, 'email' ,FILTER_SANITIZE_EMAIL);

$matricula = filter_input(INPUT_POST, 'matricula' ,FILTER_SANITIZE_STRING);

$senha = filter_input(INPUT_POST, 'senha' ,FILTER_SANITIZE_STRING);




	$sql = "INSERT INTO administrador (matricula, nome, email, senha)
	VALUES ('$matricula', '$nome', '$email', md5('$senha')) ";

	if ($conexao->query($sql) === TRUE) {
		$_SESSION['SucessoAdicionarAdministrador'] = TRUE;
	    header("Location: painel.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conexao->error;
	}

	$conexao->close();




?>



