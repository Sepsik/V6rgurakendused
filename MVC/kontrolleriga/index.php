<?php require_once("head.html"); 
$mode="";
if (!empty($_GET["mode"])) {
	$mode=$_GET["mode"];
}

switch($mode) {
	case "galerii":
		include("galerii.php");
	break;
	case "vote":
		include("vote.php");
	break;
	case "pealeht":
		include("pealeht.php");
	break;
	case "tulemus":
		include("tulemus.php");
	break;
	default:
		include("pealeht.php");
	break;
}



require_once("foot.html"); ?>
