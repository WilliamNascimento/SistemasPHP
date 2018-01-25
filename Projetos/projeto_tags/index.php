<?php 
	try {
		$pdo = new PDO("mysql:dbname=projeto_tags;host=127.0.0.1", "root", "");
	} catch (PDOException $e) {
		echo "Falhou:".$e->getMessage();
		exit;
	}

	$sql = "SELECT caracteristicas from usuarios";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		$lista = $sql->fetchAll();

		$carac = array();
		foreach ($lista as $usuario) {
			$palavras = explode(",", $usuario['caracteristicas']);

			foreach ($palavras as $palavra) {
				//O método TRIM remove os espaços do inicio e final de uma String 
				$palavra = trim($palavra);

				if(isset($carac[$palavra])){
					$carac[$palavra]++;
				}else{
					$carac[$palavra] = 1;
				}
			}
		}
		

		//Dividir 
		$palavras = array_keys($carac);
		$contagens = array_values($carac);

		$maior = max($contagens);
		//Os valores do array é o tamanho da fonte das palavras
		$tamanho = array(11, 15, 20, 30);

		for($x=0; $x < Count($palavras); $x++){
			$n = $contagens[$x] / $maior;
			//O método ceil arredonda os números para cima
			$h = ceil($n * count($tamanho));

			echo "<p style='font-size:".$tamanho[$h-1]."px'>".$palavras[$x]."</p>"; 

			//Mostra o número de vezes que cada palavra foi usada
			//echo "<p style='font-size:".$tamanho[$h-1]."px'>".$palavras[$x]."(".$contagens[$x].")</p>";
			

		}
	}
 ?>