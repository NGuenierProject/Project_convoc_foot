<?php
if(isset($_GET['id'])){
	if($_GET['id']==1){
		try{
			if (isset($_POST['competition']) && !empty($_POST['competition']) && isset($_POST['clubadv']) && !empty($_POST['clubadv']) && isset($_POST['datem']) && !empty($_POST['datem']) && isset($_POST['heure']) && !empty($_POST['heure']) && isset($_POST['terrain']) && !empty($_POST['terrain']) && isset($_POST['site']) && !empty($_POST['site']))
			{           
			$categorie = $_POST["categorie"];
			$competition = $_POST["competition"];
			$equipe = $_POST["equipe"];
			$clubadv = $_POST["clubadv"];
			$localiteadv = $_POST["localiteadv"];
			$equipeadv = $_POST["equipeadv"];
			$datem = $_POST["datem"];
			$heure = $_POST["heure"];
			$deplacement = $_POST["deplacement"];
			$terrain = $_POST["terrain"];
			$site = $_POST["site"];
			
			setMatchs($categorie,$competition,$equipe,$clubadv,$localiteadv,$equipeadv,$datem,$heure,$deplacement,$terrain,$site);
			}
			matchs();
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&id=1&erreur=1");
		}
	}
	if($_GET['id']==2){
		try{
			if(isset($_FILES['fichcsv']))
				chargeMatchs();
			matchs();
		}
		catch (Exception $e) {	
			header("Location:index.php?action=matchs&id=2&erreur=2");
		}
	}
	if($_GET['id']==3){
		try{
				
			matchs();
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&id=3&erreur=3");
		}
	}
	if($_GET['id']==4){
		try{
			$datemodif=$_POST["datem"];
			$equipemodif=$_POST["nomEaM"];
			if(supMatchs($datemodif,$equipemodif)=='err')
				echo "<p style='color:red'>Les informations ne sont pas valides</p>";
			else
				supMatchs($datemodif,$equipemodif);
			matchs();
		}
		catch (Exception $e) {
			header("Location:index.php?action=matchs&id=4&erreur=4");
		}
	}
}
else matchs();

?>
