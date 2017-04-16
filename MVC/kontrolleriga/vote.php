<?php require_once("head.html"); 
	  require_once("funktsioon.php");
?>

		<div id="wrap">
			<h3>Vali oma lemmik :)</h3>
			<form action="tulemus.php?mode=tulemus" method="POST">
				<?php LisaPildidVoteAknasse()?>
				<br/>
				<input type="submit" value="Valin!"/>
			</form>

		</div>
<?php require_once("foot.html"); ?>

				