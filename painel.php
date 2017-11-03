<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> PAINEL DE CHAMADOS </title>
</head>
<body>
	<header>
		<h1>CHAMADOS ABERTOS</h1>
		<a href="formularionovochamado.html">Novo chamado</a>
		<hr>
	</header>
	
	<table border="1" width="100%">
    <tr>
        <th>CHAMADO</th>
        <th>UNIDADE</th>
        <th>USUÁRIO</th>
		<th>DESCRIÇÃO</th>
        <th>DATA</th>
		<th>HORA</th>
        <th>ACOES</th>
    </tr>
	
    <?php
    
		include_once 'conexao.php';    
	
		try {
			$stmt = $con->prepare("SELECT P.ID_CHAMADO, P.UNIDADE, U.USUARIO, P.DESCRICAO, P.DATA_PROVIDENCIA, P.HORA_PROVIDENCIA
									FROM PROVIDENCIAS P
										LEFT JOIN USUARIOS U ON P.ID_PESSOA=U.ID_PESSOA
									WHERE P.TIPO='N' 
										AND P.ID_CHAMADO NOT IN (SELECT P2.ID_CHAMADO FROM PROVIDENCIAS P2 WHERE P2.TIPO='F')");
		if ($stmt->execute()) {
					while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
						echo "<tr>";
						
						echo "<td>".$row->id_chamado."</td><td>".$row->unidade."</td><td>".$row->usuario."</td><td>".$row->descricao."</td><td>".$row->data_providencia."</td><td>".$row->hora_providencia
						."</td><td><center><a href=\"\">[Visualizar]</a>";
						
						echo "</tr>";
					}
				} else {
					echo "Erro: Não foi possível recuperar os dados do banco de dados";
				}
		} catch (PDOException $erro) {
			echo "Erro: ".$erro->getMessage();
		}
    ?>	
		
    
</body>
</html>