<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Abscences</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<style type="text/css">
    table,tr,th {
        border: solid 1px;
        border-collapse: collapse;}
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
</style>
</head>
<body>
	<nav>
		<a href="convocation_view.php" disabled=true> Convocation </a>
		<a href="effectif_view.php"> Effectif </a>
		<a id='ici'> Abscences </a>
		<a href="matchs_view.php"> Matchs </a>
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
                echo '</tr></table>';
    ?>
</body>
</html>
