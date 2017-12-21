<?php

$imagem = "../arquivos/imagem.png";

//Pegando a largura e altura original 
list($largura_original, $altura_original) = getimagesize($imagem);
list($largura_mini, $altura_mini) = getimagesize("../arquivos/mini_imagem.png");
//Criando a imagem
$imagem_final = imagecreatetruecolor($largura_original, $altura_original);

$imagem_original = imagecreatefrompng("../arquivos/imagem.png");
$MarcaDagua = imagecreatefrompng("../arquivos/mini_imagem.png");

//Copiando a imagem

//header("Content-Type: image/png");

imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

imagecopy($imagem_final, $MarcaDagua, 0, 0, 0, 0, $largura_mini, $altura_mini);



imagepng($imagem_final, "imagem_marca_dagua.png");



