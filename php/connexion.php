<?php
// connexion a la bdd
include("bdd/connectBdd.php");
$card = "";

//// verification si le bouton du formuliare a ete click
if (isset($_POST["submitFormConnexion"])) {

    //// verification si l'adresse mail et le mot de passe

    if (empty($_POST["email"]) && empty($_POST["password"])) {
        /// verification que le mot de passe soit bien entrer 

    } elseif (empty($_POST["email"])) {
        /// verification que le mail soit bien entrer 
        echo 'pas de mail';
    } elseif (empty($_POST["password"])) {

        echo 'pas de mot de passe ';
    } else {
        $email = $_POST["email"];
        ////si il n'y a pas de probleme alors je verifie avec la base de données////
        $query = $db->prepare("SELECT * FROM connexions  WHERE email = :email");
        $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();



        ///// 
        if ($data['password'] == md5($_POST['password'])) {

            echo 'vous etes bien connecter.';
        } else {

            echo 'l\'utilisateur n\'ai pas reconnu';
        }
        $query->CloseCursor();
    }
}





$genre = $db->query("SELECT distinct genre FROM stock");
$typeVet = $db->query("SELECT distinct typeVet FROM stock");
$taille = $db->query("SELECT distinct taille FROM stock");
$couleur = $db->query("SELECT distinct couleur FROM stock");
$Quantite = $db->query("SELECT distinct Quantite FROM stock");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vitrine</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="javascript" href="js/bootstrap.js">
   
<script src="./js/node_modules/jquery/dist/jquery.slim.js"></script>
<script src="./js/node_modules/bootstrap-input-spinner/src/input-spinner.js"></script>


</head>


<body style="background-color: #ececec; width:'100vh';">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">


                    <form method="POST" class="row g-3 needs-validation">




                        <!-- select pour le genre  -->

                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
                                <option selected disabled value="">Genre</option>
                                <?php
                                while ($genres = $genre->fetch()) {
                                ?>

                                    <option name=" <?php echo $genres['genre'];  ?> "> <?php echo $genres['genre'];  ?> </option>

                                <?php
                                }
                                $genre->closeCursor();
                                ?>

                            </select>
                        </div>

                        <!-- select pour le type de vetement  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
                                <option selected disabled value="">Type vetement </option>
                                <?php
                                while ($typeVets = $typeVet->fetch()) {
                                ?>

                                    <option name=" <?php echo $typeVets['typeVet'];  ?> "> <?php echo $typeVets['typeVet'];  ?> </option>

                                <?php
                                }
                                $typeVet->closeCursor();
                                ?>
                            </select>

                        </div>


                        <!-- select pour le taille  -->

                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
                                <option selected disabled value="">Taille </option>
                                <?php
                                while ($tailles = $taille->fetch()) {
                                ?>

                                    <option name=" <?php echo $tailles['taille'];  ?> "> <?php echo $tailles['taille'];  ?> </option>

                                <?php
                                }
                                $taille->closeCursor();
                                ?>
                            </select>

                        </div>


                        <!-- select pour le couleur  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
                                <option selected disabled value="">Couleur </option>
                                <?php
                                while ($couleurs = $couleur->fetch()) {
                                ?>

                                    <option name=" <?php echo $couleurs['couleur'];  ?> "> <?php echo $couleurs['couleur'];  ?> </option>

                                <?php
                                }
                                $couleur->closeCursor();
                                ?>
                            </select>

                        </div>



                        <!-- select pour le quantité  -->
                        <div class="col-md-3">
                        <label for="qte" class="col-sm-3 col-form-label">Quantité</label>
                     <input type="number" name="quantite" id="qte" value="0" min="0" max="100" step="1">
                        <script>$("input[type='number']").inputSpinner();
                            </script>
                        </div>

                        <div class="col-12">
                            <div class="form-check form-check-inline">
                                <!-- checkbox Consultation -->
                                <input class="form-check-input" type="radio" name="radio" value="consultaion" id="RadioDefault1">
                                <label class="form-check-label" for="RadioDefault1">
                                    Consultation
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <!-- checkbox pour les achats  -->
                                <input class="form-check-input" type="radio" name="radio" value="achat" id="RadioDefault2">
                                <label class="form-check-label" for="RadioDefault2">
                                    Achat
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <input class="btn btn-primary" value="Envoi" name="submitEnvoi" type="submit"></input>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

    </div>

    </div>
    </div>
                            </br>
                            <div style="position: relative;width: 95%; display: block;overflow-x: hidden; margin: auto;">
    <div class="row row-cols-2 row-cols-md-4 g-4">   
        <?php 
   include 'componant/cardObject.php'
   ?>
   </div>
   </div>



</body>


</html>