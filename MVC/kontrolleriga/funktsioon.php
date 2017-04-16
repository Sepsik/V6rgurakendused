<?php
function LisaPildidVoteAknasse() {
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


	function LisaPildidGaleriiAknasse() {
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
					$altNimi = $key + 1;
					echo "<img src=\"pildid/$pilt\" alt=\"nimetu $altNimi\" />";
		}
	}

?>