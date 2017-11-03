<?php 

	include_once 'conexao.php';    
    
	$nome = $_POST["nome"];
    $email = $_POST["email"];
    $contato = $_POST["contato"];
	$senha = $_POST["senha"];
	$tipo = $_POST["tipo"];

	try{
		$stmt = $con->prepare("INSERT INTO USUARIOS (ID_USUARIO, NOME_USUARIO, SENHA, EMAIL, CONTATO, TIPO) 
												VALUES (NEXTVAL('PESSOAS_ID_USUARIO_SEQ'), ?, ?, ?, ?, ?)");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $senha);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $contato);
		$stmt->bindParam(5, $tipo);
		
		if ($stmt->execute()) {
			if ($stmt->rowCount() > 0) {
				echo "Dados cadastrados com sucesso!";
			} else {
				echo "Erro ao tentar efetivar cadastro";
			}
		} else {
			   throw new PDOException("Erro: Não foi possível executar a declaração sql");
		}
	} catch (PDOException $erro) {
		echo "Erro: " . $erro->getMessage();
	}
	
?>