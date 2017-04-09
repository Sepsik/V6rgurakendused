<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> PHP 8. nädal </title>
		<style>
			#konteiner {position: relative; left: 30%; height: 100%; width: 40%;}
			#tekstiAla {height: 250px; width: 100%;}
		</style>
	</head>
	<body>
		
		<?php 
			$sisestatudTekst = "näidistekst";
			$fnt_col="#000";
			$bg_col="#fff"; 

			if (isset($_POST['tekst']) && $_POST['tekst']!="") {
				$sisestatudTekst = htmlspecialchars($_POST['tekst']);
			}

			if (isset($_POST['textColor']) && $_POST['textColor']!="") {
    		$fnt_col=htmlspecialchars($_POST['textColor']);
			}

			if (isset($_POST['bgColor']) && $_POST['bgColor']!="") {
    		$bg_col=htmlspecialchars($_POST['bgColor']);
			} 
		?>

		<div id="konteiner">
			<textarea id="tekstiAla" style="background-color: <?php echo $bg_col; ?>; color: <?php echo $fnt_col; ?>; ">
				<?php echo $sisestatudTekst; ?>
			</textarea>
			<form method="POST" action="index.php">
				<input type="textarea" name="tekst" placeholder="sisesta siia tekst"/>
				<br/>
				<label for="textColor"> Sisesta teksti värvus: </label>
                <input type="color" name="textColor" value="#000"/>
                <br/>
                <label for="bgColor"> Sisesta tausta värvus: </label>
                <input type="color" name="bgColor" value="#fff"/>
                <br/>
                <input type="submit" value="vaata tulemust"/>
			</form>
		</div>
	</body>
</html>