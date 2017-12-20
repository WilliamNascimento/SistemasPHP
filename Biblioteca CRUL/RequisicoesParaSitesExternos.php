<?php
//Iniciando a biblioteca
$ch = curl_init();
//Indicar a URL que sera feita a requisição
curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");
//Qual o metodo de envio. O valor 1 indica que a requisição é do tipo post
curl_setopt($ch, CURLOPT_POST, 1);
//Quais campos serao enviados
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=William&$idade=90&sexo=masculino");

//Receber os resultados requisitados
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Executar a 
$resposta = curl_exec($ch);
//Depois de receber a resposta é muito importante fechar a conexão
curl_close($ch);

print_r($resposta);
?>