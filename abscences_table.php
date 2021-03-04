<?php
$file = dirname(__FILE__) . "/effectif.csv";
if (file_exists($file) && $id_file = fopen($file, "r")) {
    while ($tab = fgetcsv($id_file, 200, ";")) {
	echo "<tr><td>$tab[1]</td>";
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
    fclose($id_file);
}
?>
