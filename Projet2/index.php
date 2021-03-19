<?php

require 'Controleur/controleur.php';

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'effectif') {
			require 'Controleur/controleur_effectif.php';
		}
		if ($_GET['action'] == 'matchs'){
			require 'Controleur/controleur_matchs.php';
		}
		else if ($_GET['action'] == 'absences') {
			require 'Controleur/controleur_absences.php';
		}
		else if ($_GET['action'] == 'convocation') {
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
