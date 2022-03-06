<!DOCTYPE html>
<html>
    <head>
        <title>IDENTIFICATION</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scaled=1.0">
    </head>
    <body>
        <?php 

            $server= "localhost";
            $user= "root";
            $password="";
            $dbname="cs2i3";

            $_con = mysqli_connect($server,$user,$password,$dbname);

            if(!$_con){
                die("connexion échouée".mysqli_connect_error());
            }
            else{
                echo"<script> alert(\"Connexion réussie\")</script>";
            }

            if(!empty($_POST['bouton'])){
                
                $matricule=$_POST["matricule"];
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $diplome=$_POST["diplome"];
                $an_obtention=$_POST["an_obtention"];
                $ecole_diplome=$_POST["ecole_diplome"];
                $req=" INSERT INTO etudiant(matricule,nom,prenom,diplome,an_obtention,ecole_diplome) VALUE('$matricule','$nom','$prenom','$diplome','$an_obtention','$ecole_diplome')";
                if(mysqli_query($_con,$req)){
                    echo"<script>alert(\"Insertion réussie\")</script>";
                    header("location:menu_principal/index.php");
                }
                else{
                    echo"<script> alert(\"Insertion échouée\")</script>";
                }
                mysqli_close(($_con));
            }

        ?>
        

        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="title">
                        <h1>ENREGISTREMENT</h1>
                    </div>
                        <div class="panel-body">
                            <form method="POST">
                                <div class="formul">
                                    <label>Matricule</label>
                                    <input type="text" class="control" name="matricule"/>
                                </div></br>
                                <div class="formul">
                                    <label>Nom</label>
                                    <input type="text" class="control" name="nom"/>
                                </div></br> 
                                <div class="formul">
                                    <label>Prénom</label>
                                    <input type="text" class="control" name="prenom"/>
                                </div></br> 
                                <div class="formul">
                                    <label>Diplome</label>
                                    <input type="text" class="control" name="diplome"/>
                                </div> <br> 
                                <div class="formul">
                                    <label>Année d'obtention</label>
                                    <input type="date" class="control" name="an_obtention"/>
                                </div></br>   
                                <div class="formul">
                                    <label>Ecole d'obtention</label>
                                    <input type="text" class="control" name="ecole_diplome"/>
                                </div> </br> </br>  
                                <div class="button">
                                    <input type="submit" value="Enregistrer" name="bouton"/>
                                    <input type="disable" value="Annuler"/> 
                                    <input type="reset" value="Effacer"/> 
                                </div>
                            </form>
                        </div>
                </div>            
            </div>        
        </div>
    </body>

</html>