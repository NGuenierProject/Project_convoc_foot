<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Effectif</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
	<legend><b>Nouveau joueur</b></legend>
	<label>Type licence : </label>
	<input type="text" name="tlic" value="" size="10" maxlength="10" required="required"/><br/><br/>
	<label>Prénom Nom : </label>
	<input type="text" name="nom" value="" size="100" maxlength="100" required="required"/><br/><br/>
	<input type="submit" value="Ajouter" name="ajouter" />
	</fieldset>
	</form>
	<?php
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	?>
	<?php
	session_start();
	if (isset($_POST['tlic']) && isset($_POST['nom']))
	{
		$file = dirname(__FILE__) . "/effectif.csv";
		if(!file_exists($file)){
			session_unset();		
		}
		$nom = $_POST['nom'];
		$nom = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$_POST['nom']); // suppression du contenu dans les balises <script>
		$nom = strip_tags($nom); // suppression des balises HTML
		$nom = str_replace(";", "", $nom); //suppression des ; qui perturbent l'écriture CSV
		$nom = trim($nom); // suppression des caractères spéciaux en début et fin de $nom
		$tlic = $_POST['tlic'];
		$done = $tlic.$nom;
		if (isset($_SESSION[$done])) {
			echo "<h3>{$nom} : vous êtes déjà licencié !</h3>";
			require_once("effectif_table.php");
		} else {
		    $_SESSION[$done] = $done;
			if(isset($_SESSION["nb_licencie"])==null)
				$id=1;
			else $id = 1+$_SESSION["nb_licencie"];
		    $rec = $id . ";" . $tlic . ";" . $nom . "\n";
		    if (file_exists($file)) {
		        if ($id_file = fopen($file, "a")) {
		            flock($id_file, 2);
		            fwrite($id_file, $rec);
		            flock($id_file, 3);
		            fclose($id_file);
		            echo "<h3>", ucwords(strtolower($nom)), " : vous êtes licencié !</h3>";
		        } else {
		            echo "Fichier inaccessible !";
		        }
		    } else {
		        $id_file = fopen($file, "w");
		        fwrite($id_file, $rec);
		        fclose($id_file);
		    }
		    require_once("effectif_table.php");
		}
	} else {
		require_once("effectif_table.php");
	}
	?>
</body>
</html>
