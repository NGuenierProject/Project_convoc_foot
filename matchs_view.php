<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sommaire automatique avec jQuery</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style type="text/css">
    table,tr,th {
        border: solid 1px;
        border-collapse: collapse;
    }
</style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
	<legend><b>Match</b></legend>
	<label>Categorie :</label>
	<select id="categorie">
        <option name="categorie" value="Senior">Senior</option>
    </select>
    <br/>
	<label>Compétition : </label>
	<input type="text" name="competition" value="" size="20" maxlength="30" required="required"/>
    <br/>
	<label>Equipe : </label>
	<select id="equipe">
        <option name="equipe" value="SENIORS_A">SENIORS_A</option>
        <option name="equipe" value="SENIORS_B">SENIORS_B</option>
        <option name="equipe" value="SENIORS_C">SENIORS_C</option>
    </select>
	<br/>
	<label>Club adverse : </label>
	<input type="text" name="clubadv" value="" size="20" maxlength="30"/>
	<br/>
	<label>Localite club adverse : </label>
	<input type="text" name="localiteadv" value="" size="20" maxlength="30"/>
	<br/>
	<label>Equipe adverse : </label>
	<input type="text" name="equipeadv" value="" size="20" maxlength="30" required="required"/>
	<br/>
	<label>Date : </label>
	<input type="date" id="datematch" name="datem" value="d-m-Y" required>
	<br/>
	<label>Heure : </label>
	<input type="time" id="heure" name="heure" min="00:00" max="23:59" required>
	<br/>
	<label>Deplacement : </label>
	<input type="text" name="deplacement" value="" size="10" maxlength="10"/>
	<br/>
	<label>Terrain : </label>
	<input type="text" name="terrain" value="" size="20" maxlength="30" required="required"/>
	<br/>
	<label>Site : </label>
	<input type="text" name="site" value="" size="20" maxlength="30" required="required"/>
	<br/>
	<input type="submit" value="Ajouter" name="ajouter" />
	</fieldset>
	</form>

	<table>
        <tr>
            <th> CATEGORIE </th>
            <th> COMPETITION </th>
            <th> EQUIPE </th>
            <th> CLUB ADVERSE </th>
            <th> LOCALITE CLUB ADVERSE </th>
            <th> EQUIPE ADVERSE </th>
            <th> DATE </th>
            <th> HEURE </th>
            <th> DEPLACEMENT </th>
            <th> TERRAIN </th>
            <th> SITE </th>
        </tr>
        <?php
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        ?>
        <?php
	session_start();
	if (isset($_POST['categorie']) && isset($_POST['competition']) && isset($_POST['equipe']) && isset($_POST['equipeadv']) && isset($_POST['datem']) && isset($_POST['heure']) && isset($_POST['terrain']) && isset($_POST['site']))
	{
		$file = dirname(__FILE__) . "/matchs.csv";
		if(!file_exists($file)){
			session_unset();		
		}
		$categorie = $_POST['categorie'];
		/*$nom = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "",$_POST['nom']); // suppression du contenu dans les balises <script>
		$nom = strip_tags($nom); // suppression des balises HTML
		$nom = str_replace(";", "", $nom); //suppression des ; qui perturbent l'écriture CSV
		$nom = trim($nom); // suppression des caractères spéciaux en début et fin de $nom
		*/
		$competition = $_POST['competition'];
		$equipe = $_POST['equipe'];
		$clubadv = $_POST['clubadv'];
		$localiteadv = $_POST['localiteadv'];
		$equipeadv = $_POST['equipeadv'];
		$datem = $_POST['datem'];
		$heure = $_POST['heure'];
		$deplacement = $_POST['deplacement'];
		$terrain = $_POST['terrain'];
		$site = $_POST['site'];
		$done = $categorie.$competition.$equipe.$clubadv.$localiteadv.$equipeadv.$datem.$heure.$deplacement.$terrain.$terrain.$site;
        $rec = $categorie.";".$competition.";".$equipe.";".$clubadv.";".$localiteadv.";".$equipeadv.";".$datem.";".$heure.";".$deplacement.";".$terrain.";".$terrain.";".$site . "\n";
        if (file_exists($file)) {
            if ($id_file = fopen($file, "a")) {
                flock($id_file, 2);
                fwrite($id_file, $rec);
                flock($id_file, 3);
                fclose($id_file);
            } else {
                echo "Fichier inaccessible !";
            }
        } else {
            $id_file = fopen($file, "w");
            fwrite($id_file, $rec);
            fclose($id_file);
        }
        require_once("matchs_table.php");
    }
    else {
        require_once("matchs_table.php");
    }
    ?>
	</table>
	
</body>
</html>
