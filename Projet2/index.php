<?php

require 'Controleur/controleur.php';

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'effectif') {
			require 'Controleur/controleur_effectif.php';
		}
		else if(isset($_GET['id'])){
			if ($_GET['action'] == 'matchs')
				require 'Controleur/controleur_matchs.php';
		}
		else if ($_GET['action'] == 'matchs'){
			matchs();
		}
		else if (($_GET['action'] == 'absences')or (($_GET['action'] == 'absences') and ($_GET['erreur'] =='1'))) {
			require 'Controleur/controleur_absences.php';
		}
		else if (($_GET['action'] == 'convocation')or (($_GET['action'] == 'convocation') and ($_GET['erreur'] =='1'))) {
			require 'Controleur/controleur_convocation.php';
		}
		else
			throw new Exception("Action non valide");
	}
	else {  // aucune action définie : affichage de l'accueil
		accueil();
	}
}
catch (Exception $e) {
	$e->getMessage();
}
