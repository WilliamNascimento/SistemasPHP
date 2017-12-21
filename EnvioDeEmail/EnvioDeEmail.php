<?php
	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addcslashes($_POST['email']);
		$msg = addcslashes($_POST['msg']);

		//Enviando os dados para envio
		$para = "wrocha__@hotmail.com";
		$assunto = "Pergunta do contato";
		$corpo = "Nome:".$nome." - E-mail: ".$email." - Mensagem: ".$msg;

		//Cabeçalho de envio
		$cabecalho = "From: boywilliam__@hotmail.com"."\r\n"."Reply-to: ".$email."\r\n"."x-Mailer: PHP/".phpversion();
		//Envio
		mail($para, $assunto, $corpo, $cabecalho);
		echo "<h2>Email enviado com sucesso</h2>";
		exit;
	}
?>

<form method="POST">
	nome:<br>
	<input type="text" name="nome"><br><br>

	E-mail:<br>
	<input type="email" name="email"><br><br>

	Mensagem:<br>
	<textarea name="msg"></textarea><br><br>

	<input type="submit" value="Enviar">
</form>