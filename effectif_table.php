<?php
$file = dirname(__FILE__) . "/effectif.csv";
$i = 0;
if (file_exists($file) && $id_file = fopen($file, "r")) {
    while ($tab = fgetcsv($id_file, 200, ";")) {
        $tlic = $tab[1];
        $nom = $tab[2];
        echo "<tr><td>$tlic</td><td>$nom</td></tr>";
        $i++;
    }
    fclose($id_file);
}
$_SESSION["nb_licencie"]=$i;
?>
