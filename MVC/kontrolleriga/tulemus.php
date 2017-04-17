
		<div id="wrap">
			<h3>Valiku tulemus</h3>
			<?php 
			if(!empty($_POST["pilt"])) {
				echo "<p> Täname. Teie valik on edastatud. </p>";
			}
			else {
				echo "<p> Te ei valinud midagi. </p>";
			}
			?>
		
		</div>
