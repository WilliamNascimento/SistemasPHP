<?php
	require 'config.php';

	$id = 0;
	//Pega o ID e atribui a variável
	if(isset($_GET['id']) && empty($_GET['id']) == false){
		$id = addslashes($_GET['id']);
	}
	//Verifica e depois atribui nome e email para as varíáveis. Depois atualiza na base de dados e redireciona para a página index.php
	if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);

		$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' where id = '$id'";
		$pdo->query($sql);

		header("Location: index.php");
	}
		
	
	$sql = "select * from usuarios where id = '$id'";
	$sql = $pdo->query($sql);
	if ($sql->rowCount() > 0 ){
		 $dado = $sql->fetch();
	}else{
		header("Location: index.php");
	}
?>

<form method="POST">
	Nome:<br>
	<input type="text" name="nome" value="<?php echo $dado['nome']?>"><br><br>
	E-mail:<br>
	<input type="text" name="email" value="<?php echo $dado['email']?>"><br><br>

	<input type="submit" value="Atualizar">
</form>