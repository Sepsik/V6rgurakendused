<?php require_once("funktsioon.php");
?>

		<div id="wrap">
			<h3>Vali oma lemmik :)</h3>
			<form action="?mode=tulemus" method="POST">
				<?php lisaPildidVoteAknasse()?>
				<br/>
				<input type="submit" value="Valin!"/>
			</form>

		</div>


				