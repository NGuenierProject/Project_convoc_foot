<?php

require 'Modele/Modele.php';

function accueil() {
	require 'Vue/accueil_view.php';
}

function effectif(){
	$joueurs=getJoueur();
	require 'Vue/effectif_view.php';
}

function convocation() {
	require'Vue/convocation_view.php';
}

function absences() {
	require'Vue/absences_view.php';
}

function matchs() {
	$matchs=getMatchs();
	require 'Vue/matchs_view.php';
}
