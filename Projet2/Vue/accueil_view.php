<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>
	<a id='ici' href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<a href='index.php?action=effectif'>EFFECTIF</a>
	<a href='index.php?action=absences'>ABSENCES</a>
	<a href='index.php?action=matchs'>MATCHS</a>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="conteneur">
	<div class="d2">
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
