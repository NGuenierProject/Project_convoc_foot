<?php

require '../Modele/Modele.php';

try{
	$q=$_GET["q"];

	$suspendu=recupSuspendu($q);
	$rep="";
	while($donnees = $suspendu->fetch())
	{
		$rep.="<tr><td>";
		$rep.=$donnees['prenom_nom'];
		$rep .="</td></tr>";
	}
	echo $rep;
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=1");
}
?>
