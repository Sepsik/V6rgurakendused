<?php
	
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));

}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	$errors = array(); 

	if(isset($_SESSION['user'])) {
    	header('Location: loomaaed.php');
    }
	else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = mysqli_real_escape_string($connection, $_REQUEST["user"]);
		$pwd = mysqli_real_escape_string($connection, $_REQUEST["pass"]);
		
		if (empty($username)){
			$errors[]="Kasutajanimi on puudu";
		}
		if (empty($pwd)) {
			$errors[]="Salasõna on puudu";
		}
		if (empty($errors)) {
            //uus if, check against db
			//kui k6ik on ok, siis session.user=1 ja return;
			$userQuery = "SELECT * FROM anita_kylastajad WHERE username='$username' AND passw=SHA1('$pwd')";
			$userResult = mysqli_query($connection, $userQuery) or die ("$userQuery - ". mysqli_error($connection));
			if (mysqli_num_rows($userResult) != 0){
				$_SESSION['user'] = 1;
    			header('Location: loomaaed.php');
			}
			else {
				echo "You don't exist";
				include_once('views/login.html');
			}
			return;
		}
		//siia kui erroreid oli
		include_once('views/login.html');
	}
	else {
  	  include_once('views/login.html');
	}

}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	if(isset($_SESSION['user'])) {
		global $connection;
		$puurid = array();
		$query = "SELECT DISTINCT(puur) FROM anita_loomaaed ORDER BY puur";
		$result = mysqli_query($connection, $query) or die ("$query - ". mysqli_error($connection));
		while($rida = mysqli_fetch_assoc($result)){
	        $puuriId = $rida['puur'];
	    	$puuriQuery = "SELECT * FROM anita_loomaaed WHERE puur=$puuriId";
	    	$puuriResult = mysqli_query($connection, $puuriQuery) or die ("$puuriQuery - ". mysqli_error($connection));
	        while($puuriLoom = mysqli_fetch_assoc($puuriResult)){ 
            	$puurid[$puuriId][] = $puuriLoom;
        }
	}
		include_once('views/puurid.html');
	}

	else {
		include_once('views/login.html');
	}
	/*
	echo "<pre>";
	print_r($puurid);
	echo "</pre>";
	*/
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	$errors = array(); 

	if(isset($_SESSION['user'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$loomaNimi = mysqli_real_escape_string($connection, $_REQUEST["nimi"]);
			$puuriNumber = mysqli_real_escape_string($connection, $_REQUEST["puur"]);
			$liik = mysqli_real_escape_string($connection, upload('liik'));
			if (empty($loomaNimi)){
				$errors[]="Loomanimi on puudu";
			}
			if (empty($puuriNumber)) {
				$errors[]="Puuri number on puudu";
			}
			if (empty($liik)) {
				$errors[] = "Faili üleslaadimine ebaõnnestus";
			}

			if (empty($errors)) {
				$animalQuery = "INSERT INTO anita_loomaaed (nimi, liik, puur) VALUES ('$loomaNimi', '$liik', $puuriNumber)";
				$animalResult = mysqli_query($connection, $animalQuery) or die ("$animalQuery - ". mysqli_error($connection));
					if (mysqli_insert_id($connection) > 0) {
						kuva_puurid();
						return;
					}
			}

		}
    	
		include_once('views/loomavorm.html');
    }
    else {
    	include_once('views/login.html');
    }
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$tmp = explode(".", $_FILES[$name]["name"]);
	$extension = end($tmp);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>