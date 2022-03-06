<!--Connexion à la BD pour le tableau des étudiants-->
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


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="bootstrap/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="fontawesome-free-5.15.2-web/css/all.min.css">
    <title>Liste</title>
    
    <!-- Pop up de suppression -->
    <style>
        .modal_delete{
        position: absolute;
        z-index: 2;
        padding: 15px;
        top: -1px;
        left: 50%;
        width: 400PX;
        height: 200px;
        background-color: #fff;
        display: none;
        justify-content: center;
        align-items: center;
        box-shadow: 2px 2px 2px rgba(51, 51, 51, 0.267) ;
        }
        .modal_delete button{
            width: 180px;
            height: 50px;
            border: none;
        }

        .annuler{
            background-color: rgb(224, 179, 163);
            border-radius: 7px;
            cursor: pointer;
        }
        .supprimer{
            background-color: rgb(224, 179, 163);
            border-radius: 7px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
               <center><button type="button"><h4>LOGO</h4></button></center>
                
                <li class="list-group-item  active"   aria-current="true"><a href=""><a href=""><i class="fas fa-users"></i>Liste des etudiants </a></li>
                         
            </div>
            <div class="col-8 col-md-10">
                <div class="iden-abre">
                    <div class="abreviation">MA<div class="green"></div></div>
                    <div class="identifiant">
                        <span>MOUKOURI Armelle</span><br>
                        <span type="colorr">armellemoukouri@gmail.com</span>
                    </div>
                </div><br><br><br>
                <div class="titre">
                    <h1>Bienvenue,Armelle</h1>
                    <p>Liste de tous les etudiants de CS2I3</p>
                </div>
                 </table>
                    <div class="content2">
                        <div class="Apprenant">
                            <h2>Etudiants</h2>
                            
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Matricule </th>
                                    <th scope="col">Nom</th>
                                    <th scope="col" >Prenom</th>
                                    <th scope="col">Diplome </th>
                                    <th scope="col">Annee d'obtention </th>
                                    <th scope="col">Ecole d'obtention </th>
                                    <th scope="col">Date d'enregistrement</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Connexion des éléments du tableau -->
                                    <?php 
                                    
                                    foreach($result as $value){
                                    
                                    ?>
                                    <tr>
                                       
                                        <td><?=$value["matricule"]?></td>
                                        <td><?=$value["nom"]?></td>
                                        <td><?=$value["prenom"]?></td>
                                        <td><?=$value["diplome"]?></td>
                                        <td><?=$value["an_obtention"]?></td>
    
                                        <td><?=$value["ecole_diplome"]?></td>
                                        <td><?=$value["dateenregistre"]?></td>  

                                        <!-- Pour le bouton supprimer -->
                                        <td><a class="delete" onclick="document.getElementById('modal').style.display='block'" href="../suppression.php?id=<?=$value["id"]?>" style="width: 100px; background-color:rgb(224, 179, 163); border-radius:10px; margin:4px 2px; padding:8px;
                                        cursor: pointer; text-decoration:none" >Supprimer</a></td>

                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>

                            <!-- Pop up de suppression -->
                            <div class="modal_delete" id="modal">
                                <div class="text-modal">
                                    <h3>Souhaitez-vous supprimer définitivement</h3>
                                    <div class="validate">
                                        <button class="annuler" onclick="document.getElementById('modal').style.display='none'">Non</button>
                                        <button class="supprimer"><a href="suppression.php?matricule=<?=$value["matricule"]?>">Oui</a></button>
                                    </div>
                                </div>
                            </div>
</body>
</html>