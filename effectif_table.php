<?php
$file = dirname(__FILE__) . "/effectif.csv";
if (file_exists($file) && $id_file = fopen($file, "r")) {
    while ($tab = fgetcsv($id_file, 200, ";")) {
        $tlic = $tab[0];
        $nom = $tab[1];
        echo "<tr><td>$tlic</td><td>$nom</td></tr>";
    }
    fclose($id_file);
}
?>
