<?php
	
	try{
		$pdo = new PDO("mysql:dbname=projeto_comentarios; host=localhost", "root", "");
		
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}

	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = $_POST['nome'];
		$mensagem = $_POST['mensagem'];

		$sql = $pdo->prepare("INSERT INTO mensagens (nome, msg, data_msg) VALUES (:nome, :msg, NOW())");
$sql->bindValue(":nome", $nome);

$sql->bindValue(":msg", $mensagem);
$sql->execute();
	}
?>

<fieldset>
	<form method="post">
		Nome:<br>
		<input type="text" name="nome"><br><br>

		Mensagem:<br>
		<textarea name="mensagem"></textarea><br><br>

		<input type="submit" value="Enviar">
	</form>
</fieldset>
<br><br>
<?php
	$sql = "select * from mensagens order by data_msg desc";
	$sql = $pdo->query($sql);
	if ($sql->rowCount() > 0) {
		foreach ($sql->fetchAll() as $mensagem) {
			?>
				<strong><?php echo $mensagem['nome'];?></strong>
				<?php echo $mensagem['msg'];?>
				<hr>
			<?php
		}
	}else
		echo "Não existem mensagem";
?>
