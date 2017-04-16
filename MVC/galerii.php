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
					$altNimi = $key + 1;
					echo "<img src=\"pildid/$pilt\" alt=\"nimetu $altNimi\" />";
		}
	}
?>
		<div id="wrap">
			<h3>Fotod</h3>
			<div id="gallery">
				<?php LisaPildid();?>
			</div>
		</div>
<?php require_once("foot.html"); ?>
