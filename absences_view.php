<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Abscences</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style type="text/css">
	table,tr,th,td {
		border: solid 1px;
		border-collapse: collapse;
	}
	#logo{
		width:80px;
	}
	nav{
		background-color:white;
		text-align:center;
	}
	a {
		font-size: 125%;
		font-family: Helvetica;
		color:black;
		margin-left: 5%;
		outline: none;
		text-decoration: none;
	}	
	a:focus {
		text-decoration: #DE9E00 underline 2px;
		color:#DE9E00;
	}
	a:hover {
		text-decoration: #DE9E00 underline 2px;
		color: #DE9E00;
	}
	#ici{
		font-weight: bold;
		text-decoration: #DE9E00 underline 2px;
		color: #DE9E00;
	}
	#lg{
		text-decoration:none;
	}
	#connect {
		text-decoration:none;
		font-size: 100%;
		color: #DE9E00;
	}
	#deconnexion{
		font-size: 100%;
	}
</style>
</head>
<body>
	<nav>
		<a id="lg" href="accueil_view.php">
		<img id="logo" alt="" src="img/logo.jpg" />
		</a>
		<a href="accueil_view.php"> ACCUEIL </a>
		<a href="convocation_view.php"> CONVOCATION </a>
		<a href="effectif_view.php"> EFFECTIF </a>
		<a id='ici' href="abscences_view.php"> ABSCENCES </a>
		<a href="matchs_view.php"> MATCHS </a>
		<?php
		session_start();
		$user = $_SESSION['username'];
		echo "<a id='connect'>Bonjour $user</a>";
		echo  "<a id='deconnexion' href='accueil_view.php?deconnexion=true'>Déconnexion</a>";
		if(isset($_GET['deconnexion'])){ 
			if($_GET['deconnexion']==true){  
				session_unset();
				header("location:accueil_view.php");
			}
		}	
		?>
	</nav>
	<br/>
    	<?php
    	echo '<table><tr><th>Code : A(bsent), B(lessé),N(on-licencié), S(uspendu)</th>';
                $date_base='2021-08-01';
                if($date_base > date('Y-m-d'))
                        echo '<th style="background-color: green;">';
                else 
                        echo '<th style="background-color: grey;">';
                echo date('m-d',strtotime($date_base)),"</th>";
                while ($date_base < '2022-07-31') {
                    $date_maj=date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
                    if($date_maj > date('Y-m-d'))
                        echo '<th style="background-color: green;">';
                    else 
                        echo '<th style="background-color: grey;">';
                    echo date('m-d',strtotime($date_maj)),"</th>";
                    $date_base = $date_maj;
                }
                echo '</tr>';
		try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'etudiant', 'etudiant');
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
		}

		// Si tout va bien, on peut continuer

		// On récupère les noms de la table effectif
		$reponse = $bdd->query('SELECT prenom_nom FROM effectif');

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			$nom = $donnees['prenom_nom'];
			echo "<tr><td>$nom </td>";
			$date_base='2021-08-01';
			while ($date_base<='2022-07-31'){
				$date_maj=date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
				echo '<td><select name="test">
				<option value="rien" selected>...</option>
				<option value="absent">A</option>
				<option value="Nonlicencie">N</option>
				<option value="Blesse">B</option>   
				<option value="Suspendu">S</option> 
				</select></td>';               
                    	$date_base = $date_maj;
			}
			echo "</tr>";
		}

		$reponse->closeCursor(); // Termine le traitement de la requête

    ?>
</body>
</html>
