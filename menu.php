<?php 
    try{
        $_con = new PDO("mysql:host=localhost;dbname=cs2i3", "root", "");
        
    }
    catch(PDOException $e){
        echo"Erreur de la connexion".$e->getMessage();
    }

    $req = $_con->prepare("SELECT * FROM etudiant");
    $req->execute();
    $result = $req->fetchAll();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>MENU</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scaled=1.0">
        <link rel="stylesheet" href="style3.css">
    </head>
    <body>
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="title">
                        <h1>BIENVENUE DANS LA PAGE D'ENREGISTREMENT DES ETUDIANTS DE CS2I3 DWM</h1>
                    </div>
                        <div class="panel-body">
                            <div class="button">
                                <button class="enregistrer"><a href="identification.php">Enregistrement des étudiants</a></button>
                                <button class="liste"><a href="menu_principal/index.php">Liste des etudiants</a></button>
                            </div>
                        </div>
                </div>            
            </div>        
        </div>
    </body>
</html>