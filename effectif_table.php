<style>
	table,tr,th,td{
		border: solid 1px;
		border-collapse: collapse;
		text-align: left;
	}
	th{
		width:30%;
	}
	#letout #gauche {
    	float:left;
    	width:40%;
	}
</style>
<?php
$file = dirname(__FILE__) . "/effectif.csv";
$i = 0;
if (file_exists($file) && $id_file = fopen($file, "r")) {
	echo "<div id=\"gauche\">";    
	echo "<table border=\"1\">";
    echo "<tr><th>TYPE LICENCE</th><th>PRENOM, NOM</th></tr>";
    while ($tab = fgetcsv($id_file, 200, ";")) {
        $tlyc = $tab[1];
        $nom = $tab[2];
        echo "<tr><td>$tlyc</td><td>$nom</td></tr>";
        $i++;
    }
    echo "</table> </div>";
    fclose($id_file);
}
$_SESSION["nb_licencie"]=$i;
?>
