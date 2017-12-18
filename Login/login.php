<?php

session_start();
if(isset($_POST['email']) && empty($_POST['email']) == false){
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	 $dns = "mysql:dbname=blog;host=127.0.0.1";
	 $dbuser = "root";
	 $dbpass = "";

	 try {
	 	$db = new PDO($dns, $dbuser, $dbpass);

	 	$sql = $db->query("Select * from usuarios where email = '$email' and senha = '$senha'");

	 	if ($sql->rowCount() > 0) {
	 		$dado = $sql->fetch();

	 		$_SESSION['id'] = $dado['id'];

	 		header("Location: index.php");
	 	}
	 } catch (PDOException $e) {
	 	echo "Falhou: ".$e->getMessage();
	 }
}

?>

<h1>Página de login</h1>

<form method="POST">
	E-mail:<br>
	<input type="email" name="email"><br><br>

	senha:<br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Entrar">
</form>