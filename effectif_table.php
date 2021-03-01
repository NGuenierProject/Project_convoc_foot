<?php
$file = dirname(__FILE__) . "/effectif.csv";
$i = 0;
if (file_exists($file) && $id_file = fopen($file, "r")) {
    echo "<table border=\"1\"><tbody>";
    echo "<thead><tr><th>TYPE LICENCE</th><th>PRENOM, NOM</th></tr></thead>";
    while ($tab = fgetcsv($id_file, 200, ";")) {
        $tlyc = $tab[1];
        $nom = $tab[2];
        echo "<tr><td>$tlyc</td><td>$nom</td></tr>";
        $i++;
    }
    echo "</tbody></table>";
    fclose($id_file);
}
$_SESSION["nb_licencie"]=$i;
?>
