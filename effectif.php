<?php
    $serveur = "localhost";
    $dbname = "projet";
    $user = "etudiant";
    $pass = "etudiant";
    
    $tlic = $_POST["tlic"];
    $nom = $_POST["nom"];
    
    try{
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sth = $dbco->prepare("
            INSERT INTO effectif(type_licence, prenom_nom)
            VALUES(:tlic, :nom)");
        $sth->bindParam(':tlic',$tlic);
        $sth->bindParam(':nom',$nom);
        $sth->execute();
        
        header("Location:effectif_view.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
