<?php 

    $id=$_GET['id'];
    echo $id;

    try{
        $_con = new PDO("mysql:host=localhost;dbname=cs2i3", "root", "");
        echo "connexion réussie";
    }
    catch(PDOException $e){
        echo"Erreur de la connexion".$e->getMessage();
    }

    if(isset($_GET['id'])){
        $sto= $_con->prepare("DELETE FROM etudiant WHERE id=:id");
        $sto->bindParam(':id', $id);
        $sto->execute();
        header("location:menu_principal/index.php");
    }


?>