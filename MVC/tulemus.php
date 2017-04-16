<?php require_once("head.html"); ?>
		<div id="wrap">
			<h3>Valiku tulemus</h3>
			<?php 
			if(!empty($_GET["pilt"])) {
				echo "<p> Täname. Teie valik on edastatud. </p>";
			}
			else {
				echo "<p> Te ei valinud midagi. </p>";
			}
			?>
		
		</div>
<?php require_once("foot.html"); ?>