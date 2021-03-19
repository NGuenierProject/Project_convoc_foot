<?php $titre = 'Absences'; ?>
<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<a href='index.php?action=effectif'>EFFECTIF</a>
	<a id='ici' href='index.php?action=absences'>ABSENCES</a>
	<a href='index.php?action=matchs'>MATCHS</a>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
	<div id="tableau">
	<table><tr><th>Code : A(bsent), B(lessé),N(on-licencié), S(uspendu)</th>
	<?php  $date_base='2021-08-01';
                while ($date_base <= '2022-07-31') {
                    if($date_base > date('Y-m-d'))
                        echo '<th style="background-color: lightgreen;">';
                    else 
                        echo '<th style="background-color: lightgrey;">';
                    echo date('m-d',strtotime($date_base)),"</th>";
                    $date_base = date('Y-m-d',strtotime('+7 day', strtotime($date_base)));
                }
	?>
	</tr>
	<?php $compteur=0;
	$reste=47;
	foreach($joueursAbs as $joueur): ?>
		<tr>
		<td><?= $joueur['prenom_nom'] ?></td>
		</tr>
	<?php endforeach;?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
