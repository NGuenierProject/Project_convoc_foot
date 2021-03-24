<?php

require '../Modele/Modele.php';

try{
	$q=$_GET["q"];
	$option=creeroption();
	$rep="<option></option>";
	
	while($donnees = $option->fetch())
	{
		if($donnees['prenom_nom']==$q){
			$rep.="<option selected>";
			$rep.=$donnees['prenom_nom'];
			$rep .="</option>";
			supprimerexempt($q);
		}
		else{
			$rep.="<option>";
			$rep.=$donnees['prenom_nom'];
			$rep .="</option>";
		}
	}
	echo $rep;
}
catch (Exception $e) {
	header("Location:index.php?action=convocation&erreur=2");
}
?>
