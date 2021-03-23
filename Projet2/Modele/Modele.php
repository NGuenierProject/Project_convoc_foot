<?php

function getJoueur() {
    $bdd = getBdd();
    $joueur = $bdd->query('SELECT * FROM effectif');
    return $joueur;
}

function setJoueur($tlic,$nom) {
	$bdd = getBdd();
	$sth = $bdd->prepare("
	INSERT INTO effectif(type_licence, prenom_nom) VALUES(:tlic, :nom)");
	$sth->bindParam(':tlic',$tlic);
	$sth->bindParam(':nom',$nom);
	$sth->execute();
}

function setAbsence($nom,$date_base,$motif) {
	$bdd = getBdd();
	$sth = $bdd->prepare("
	INSERT INTO absences(prenom_nom, date, motif)
			    VALUES(:nom, :date_base,:motif)");
	$sth->bindParam(':nom',$nom);
	$sth->bindParam(':date_base',$date_base);
	$sth->bindParam(':motif',$motif);
	$sth->execute();
}


function getMatchs(){
	$bdd = getBdd();
	$match= $bdd->query('SELECT * FROM matchs');
	return $match;
}

function setMatchs($categorie,$competition,$equipe,$clubadv,$localiteadv,$equipeadv,$datem,$heure,$deplacement,$terrain,$site) {
	$bdd = getBdd();
	$sth = $bdd->prepare("
	INSERT INTO matchs(categorie, competition, equipe, club_adverse, localite_club_adverse, equipe_adverse, date, heure, deplacement, terrain, site) VALUES(:categorie, :competition, :equipe, :clubadv, :localiteadv, :equipeadv, :datem, :heure, :deplacement, :terrain, :site)");
	$sth->bindParam(':categorie',$categorie);
	$sth->bindParam(':competition',$competition);
	$sth->bindParam(':equipe',$equipe);
	$sth->bindParam(':clubadv',$clubadv);
	$sth->bindParam(':localiteadv',$localiteadv);
	$sth->bindParam(':equipeadv',$equipeadv);
	$sth->bindParam(':datem',$datem);
	$sth->bindParam(':heure',$heure);
	$sth->bindParam(':deplacement',$deplacement);
	$sth->bindParam(':terrain',$terrain);
	$sth->bindParam(':site',$site);
	$sth->execute();
}

function chargeMatchs(){
	$bdd = getBdd();
	$file =$_FILES["fichcsv"]["tmp_name"];
	if (file_exists($file) && $id_file = fopen($file, "r")) {
		while ($tab = fgetcsv($id_file, 200, ";")) {
			$categorie = $tab[0];
			$competition = $tab[1];
			$equipe = $tab[2];
			$clubadv = $tab[3];
			$localiteadv = $tab[4];
			$equipeadv = $tab[5];
			$datem = $tab[6];
			$heure = $tab[7];
			$deplacement = $tab[8];
			$terrain = $tab[9];
			$site =$tab[10];
	    
			$reponse=$bdd->query('SELECT * FROM matchs WHERE date="'.$datem.'" AND equipe="'.$equipe.'"');
			if ($reponse->fetch()) { 
				$sth = $bdd->prepare('UPDATE matchs SET categorie="'.$categorie.'", competition="'.$competition.'", equipe="'.$equipe.'", club_adverse="'.$clubadv.'", localite_club_adverse="'.$localiteadv.'", equipe_adverse="'.$equipeadv.'", date="'.$datem.'", heure="'.$heure.'", deplacement="'.$deplacement.'", terrain="'.$terrain.'", site="'.$site.'" WHERE date="'.$datem.'" AND equipe="'.$equipe.'"');
				$sth->execute();
			} 
			else { 
				$sth = $bdd->prepare("
			INSERT INTO matchs(categorie, competition, equipe, club_adverse, localite_club_adverse, equipe_adverse, date, heure, deplacement, terrain, site)		
			VALUES(:categorie, :competition, :equipe, :clubadv, :localiteadv, :equipeadv, :datem, :heure, :deplacement, :terrain, :site)");
			$sth->bindParam(':categorie',$categorie);
			$sth->bindParam(':competition',$competition);
			$sth->bindParam(':equipe',$equipe);
			$sth->bindParam(':clubadv',$clubadv);
			$sth->bindParam(':localiteadv',$localiteadv);
			$sth->bindParam(':equipeadv',$equipeadv);
			$sth->bindParam(':datem',$datem);
			$sth->bindParam(':heure',$heure);
			$sth->bindParam(':deplacement',$deplacement);
			$sth->bindParam(':terrain',$terrain);
			$sth->bindParam(':site',$site);
			$sth->execute();
			}
			
		}	
		fclose($id_file);
	}
}

function supMatchs($datemodif,$equipemodif){
	$bdd = getBdd();
	$match= $bdd->query('SELECT * FROM matchs WHERE date="'.$datemodif.'" AND equipe="'.$equipemodif.'"');
	if ($match->fetch()){
		$sth = $bdd->prepare('DELETE FROM matchs WHERE equipe="'.$equipemodif.'" AND date="'.$datemodif.'" ');
		$sth->execute();
       	}
	else {
	    header("Location:index.php?action=matchs&amp;id=4&amp;erreur=4");
	}
}

function getJAbsent() {
    $bdd = getBdd();
    $joueur = $bdd->query('SELECT prenom_nom FROM effectif');
    return $joueur;
}

function getJprem() {
    $bdd = getBdd();
    $joueur = $bdd->query('SELECT prenom_nom FROM effectif');
$donnees=$joueur->fetch();
    return $donnees;
}


function getMAbsent() {
    $bdd = getBdd();
    $matchs = $bdd->query('SELECT prenom_nom, motif FROM absences ');
    return $matchs;
}

function recupValMatchs($date,$nom){
	$bdd = getBdd();
	$matchs= $bdd->query('SELECT * FROM matchs WHERE date="'.$date.'" AND equipe="'.$nom.'"');
	return $matchs;
}

function validMatchs($modcategorie,$modcompetition,$modequipe,$modclubadv, $modlocaliteadv, $modequipeadv, $moddatem, $modheure, $moddeplacement, $modterrain, $modsite,$date,$nom){
	$bdd = getBdd();
	$matchs = $bdd->prepare('
        UPDATE matchs
        SET 
            categorie="'.$modcategorie.'",
            competition="'.$modcompetition.'",
            equipe="'.$modequipe.'",
            club_adverse="'.$modclubadv.'",
            localite_club_adverse="'.$modlocaliteadv.'",
            equipe_adverse="'.$modequipeadv.'",
            date="'.$moddatem.'",
            heure="'.$modheure.'",
            deplacement="'.$moddeplacement.'",
            terrain="'.$modterrain.'",
            site="'.$modsite.'"
            WHERE equipe="'.$nom.'" AND date="'.$date.'"
        ');
        $matchs->execute();
}

function recupValMatchs1($date,$nom){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT * FROM matchs WHERE equipe='".$nom."' and date='".$date."'");
	return $matchs;
}

function recupExempt($date){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT prenom_nom FROM absences WHERE date='".$date."' AND motif='...'");
	return $matchs;
}

function recupAbsent($date){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT prenom_nom FROM absences WHERE date='".$date."' AND motif='A'");
	return $matchs;
}

function recupBlesse($date){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT prenom_nom FROM absences WHERE date='".$date."' AND motif='B'");
	return $matchs;
}

function recupSuspendu($date){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT prenom_nom FROM absences WHERE date='".$date."' AND motif='S'");
	return $matchs;
}

function recupNonlic($date){
	$bdd = getBdd();
	$matchs= $bdd->query("SELECT prenom_nom FROM absences WHERE date='".$date."' AND motif='N'");
	return $matchs;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'etudiant', 'etudiant', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}


