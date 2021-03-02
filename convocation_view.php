<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Convocation</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style>
table,tr,th,td{
	border: solid 1px;
	border-collapse: collapse;
	text-align: left;
}
td {
    width: 25%;
}
.number{
	text-align: right;
}
.conv{
	text-align: center;
}
#tab {
        width:40%;
}
.prepa {
        text-align: center;
}

nav{
	background-color:#00ced1;	
}
a {
	font-size: 150%;
	color:white;
	margin-right: 2%;
	outline: none;
	text-decoration: none;
}	
a:focus {
	background: #ffe4c4;
}
a:hover {
	background: #ffe4c4;
}
#ici{
	background: #4682B4;
	font-weight: bold;
	border: solid 1px black;
}
#letout #gauche {
    	float:left;
    	width:40%;
}
</style>
</head>
<body>
	<nav>
		<a id='ici'> Convocation </a>
		<a href="effectif_view.php"> Effectif </a>
		<a href="abscences_view.php"> Abscences </a>
		<a href="matchs_view.php"> Matchs </a>
	</nav>
	<br/>
	<div id=letout>
	<div id=gauche>
	<table>
		<tr>
			<th></th>
			<th class='conv' colspan=3>CONVOCATION</th>
		</tr>
		<tr>
			<th>DATE</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>COMPETITION</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>EQUIPE ADVERSE</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>SITE</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>TERRAIN</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>HEURE</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>RDV</th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th>EQUIPE</th>
			<th>SENIORS_A</th>
			<th>SENIORS_B</th>
			<th>SENIORS_C</th>
		</tr>
		<tr>
			<th class='number'>1 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>2 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>3 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>4 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>5 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>6 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>7 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>8 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>9 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>10 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>11 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>12 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>13 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
		<tr>
			<th class='number'>14 </th>
			<td>...</td>
			<td>...</td>
			<td>...</td>
		</tr>
	</table>
	</div>
	<div id=droite>
	<table id="tab">
    	<tr>
            <td colspan="5" class="prepa">EN PREPARATION</td>
        </tr>
        <tr>
            <th> EXEMPTS </th>
            <th> ABSENTS </th>
            <th> BLESSES </th>
            <th> SUSPENDUS </th>
            <th> NON-LICENCIES/-HABILITES </th>
        </tr>
   	</table>
	</div>
	</div>
</body>
</html>
