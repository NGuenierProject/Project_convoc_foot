<?php $titre = 'Effectif'; ?>
<?php ob_start(); ?>
	<a href="index.php">ACCUEIL</a>
	<a href="index.php?action=convocation">CONVOCATION</a>
	<a id='ici' href='index.php?action=effectif'>EFFECTIF</a>
	<a href='index.php?action=absences'>ABSENCES</a>
	<a href='index.php?action=matchs'>MATCHS</a>
<?php $entete = ob_get_clean(); ?>

<?php ob_start(); ?>
<div id="letout">
	<div id="gauche">    
	<table border="1">
	<tr><th>TYPE LICENCE</th><th>PRENOM, NOM</th></tr>		
	<?php foreach($joueurs as $joueur): ?>
		<tr>
		<td><?= $joueur['type_licence'] ?></td>
		<td><?= $joueur['prenom_nom'] ?></td>
		</tr>
	<?php endforeach;?>
	</table>
	</div>
	<div id="droite">
	<form action="index.php?action=effectif" method="post">
	<fieldset>
	<legend><b>Nouveau joueur</b></legend>
	<label>Type licence : </label>
	<input type="text" name="tlic" value="" size="10" maxlength="10" required="required"/><br/><br/>
	<label>Prénom Nom : </label>
	<input type="text" name="nom" value="" size="20" maxlength="40" required="required"/><br/><br/>
	<input type="submit" value="Ajouter" name="ajouter" />
	<?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1){
                echo "<p style='color:red'>Il existe déjà un joueur à ce nom</p>";
            }
        }
        ?>
	</fieldset>
	</form>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>