<?php

//Recebendo arquivos
$arquivo = $_FILES['arquivo'];

if (isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {
	$nomedoarquivo = md5(time().rand(0,99)).'.png';
	//Move para uma repositorio o arquivo
	move_uploaded_file($arquivo['tmp_name'], '../arquivos/'.$nomedoarquivo);

	echo "Arquivo enviado com sucesso!";
}else{
	echo "Erro ao enviar arquivo";
}
/*
if (isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {
	
	//Move para uma repositorio o arquivo
	move_uploaded_file($arquivo['tmp_name'], '../arquivos/'.$arquivo['name']);

	echo "Arquivo enviado com sucesso!";
}else{
	echo "Erro ao enviar arquivo";
}*/
?>