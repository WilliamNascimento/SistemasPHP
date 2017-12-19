<?php
	
	$arquivo = "../arquivos/imagem.jpg";

	//Valor máximo que cada imagem terá
	$largura = 200;
	$altura = 200;

	//pega o tamanho original da imagem
	//Maneira mais fácil
	list($largura_original, $altura_original) = getimagesize($arquivo);

	//Ratio da imagem
	$ratio = $largura_original/$altura_original;

	if($largura/$altura > $ratio){
		$largura = $altura * $ratio;
	}else{
		$altura = $largura * $ratio;
	}

	//Criando a nova imagem vazia
	$imagem_final = imagecreatetruecolor($largura, $altura);
	//Armazenar a imagem em uma variável 
	$imagem_original = imagecreatefromjpeg($arquivo);
	//Pegar a imagem original e transferir para a imagem final
	imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);

	//Exibir a imagem na tela
	//imagepng($image_final, null);

	//Diz para o navegador interpretar como imagem e não como texto
	header("Content-Type: image/jpeg");

	//imagejpeg("Imagem", "Diretorio", "Qualidade da imagem");
	/*Mostrando no navegador
		imagejpeg($imagem_final, null, 70);
	*/

	//Salvando
	imagejpeg($imagem_final, "../arquivos/mini_imagem.jpeg", 70);

/*-----------------------------------------------------------------
-----------------------------PNG-----------------------------------
-------------------------------------------------------------------


	$arquivo = "../arquivos/imagem.png";

	//Valor máximo que cada imagem terá
	$largura = 200;
	$altura = 200;

	//pega o tamanho original da imagem
	//Maneira mais fácil
	list($largura_original, $altura_original) = getimagesize($arquivo);

	//Ratio da imagem
	$ratio = $largura_original/$altura_original;

	if($largura/$altura > $ratio){
		$largura = $altura * $ratio;
	}else{
		$altura = $largura * $ratio;
	}

	//Criando a nova imagem vazia
	$imagem_final = imagecreatetruecolor($largura, $altura);
	//Armazenar a imagem em uma variável 
	$imagem_original = imagecreatefrompng($arquivo);
	//Pegar a imagem original e transferir para a imagem final
	imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);

	//Exibir a imagem na tela
	//imagepng($image_final, null);

	//Diz para o navegador interpretar como imagem e não como texto
	header("Content-Type: image/png");

	//imagejpeg("Imagem", "Diretorio", "Qualidade da imagem");
	/*Mostrando no navegador
		imagejpeg($imagem_final, null, 70);
	*/

	//Salvando
	//imagejpeg($imagem_final, "../arquivos/mini_imagem.png");



*/