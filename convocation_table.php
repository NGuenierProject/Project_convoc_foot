<?php
function comp_A(){
	$file = dirname(__FILE__) . "/matchs.csv";
	if (file_exists($file) && $id_file = fopen($file, "r")) {
	    while ($tab = fgetcsv($id_file, 200, ";")) {
		if(($_POST['date1']==$tab[6])&&('SENIORS_A'==$tab[2]))
			 echo "Success";
		else
			 echo "Failed";
	    }
	    fclose($id_file);
	}
}
?>
