<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> PHP harjutus 1 </title>
	</head>
	<body>
		<?php
		$tekst = "See on mingi suvaline tekst";
		echo "$tekst <br/>";

		$tekstiPikkus = strlen($tekst);

		echo "Mille pikkus on ".$tekstiPikkus." tähemärki koos tühikutega. <br/>";
		echo "Peegelpildis tekst: ";

		$peegelpilt = array();
		
		for ($i=0; $i < $tekstiPikkus ; $i++) { 
			$uusIndeks = $tekstiPikkus-$i;
			$t2ht = $tekst[$i];
			$peegelpilt[$uusIndeks] = $t2ht;
		}
			ksort($peegelpilt);
			
			foreach ($peegelpilt as $value) {
				echo "$value";
			}
		?>
	</body>
</html>