<?php
try{
	if (isset($_POST['tlic']) && !empty($_POST['tlic']) && isset($_POST['nom']) && !empty($_POST['nom']))
	{           
		$tlic= $_POST['tlic'];
		$nom = $_POST['nom'];
	
		setJoueur($tlic, $nom);
	}
	effectif();
}
catch (Exception $e) {
	header("Location:index.php?action=effectif&erreur=1");
}

?>
