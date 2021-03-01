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
        border-collapse: collapse;}
</style>
</head>
<body>
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
	<script defer src="sommaire-auto.js"></script>
</body>
</html>
