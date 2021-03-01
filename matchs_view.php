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
	<br/>
	<label>Compétition : </label><br/>
	<label>Equipe : </label><br/>
	<label>Club adverse : </label><br/>
	<label>Localite club adverse : </label><br/>
	<label>Equipe adverse : </label><br/>
	<label>Date : </label><br/>
	<label>Heure : </label><br/>
	<label>Deplacement : </label><br/>
	<label>Terrain : </label><br/>
	<label>Site : </label><br/>
	<input type="submit" value="Ajouter" name="ajouter" />
	</fieldset>
	</form>
	<?php
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	?>

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
	</table>
	<script defer src="sommaire-auto.js"></script>
</body>
</html>
