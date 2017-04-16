<?php require_once("head.html"); 
function LisaPildid() {
		$dir = "pildid"; 
		$pildid = array(); 
		if ($dh = opendir($dir)) { 
  			while (($file = readdir($dh)) !== false) { 
    			if(!is_dir($file)) { 
      				$pildid[] = $file;
    			}
 			}
  			closedir($dh); 
		} 
		else { 
			die("Ei suuda avada kataloogi $dir");
		}

		foreach($pildid as $key => $pilt) {
					$jrkNr = $key + 1;
					echo "<p>";
					echo "<label for=\"p$jrkNr\">";
					echo "<img src=\"pildid/$pilt\" alt=\"nimetu $altNimi\" height=\"100\" />";
					echo "</label>";
					echo "<input type=\"radio\" value=\"$jrkNr\" id=\"p$jrkNr\" name=\"pilt\" />";
					echo "</p>";
		}
	}
?>
		<div id="wrap">
			<h3>Vali oma lemmik :)</h3>
			<form action="tulemus.php" method="GET">
				<?php LisaPildid();?>
				<br/>
				<input type="submit" value="Valin!"/>
			</form>

		</div>
<?php require_once("foot.html"); ?>

				