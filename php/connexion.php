
<?php
// connexion a la bdd
include ("bdd/connectBdd.php"); 


//// verification si le bouton du formuliare a ete click
if(isset($_POST["submitFormConnexion"]))  
      {  

                   //// verification si l'adresse mail et le mot de passe

           if(empty($_POST["email"]) && empty($_POST["password"]))  
           {  
                  /// verification que le mot de passe soit bien entrer 
            
           }
           elseif (empty($_POST["email"])) {
                     /// verification que le mail soit bien entrer 
                    echo 'pas de mail';

            }
            elseif (empty($_POST["password"])) {

                    echo 'pas de mot de passe ';
                
               
              
           }else  
           {  
                  ////si il n'y a pas de probleme alors je verifie avec la base de données////
                $query = $db->prepare("SELECT * FROM connexions  WHERE email = :email");  
                $query->bindValue(':email', $_POST['email'] ,PDO::PARAM_STR); 
                $query->execute();
                
                $data = $query->fetch();
               
                if ($data['password'] == $_POST['password']) {


                  ///// passer le mot de passe en md5 ne pas oublier 
               // if ($data['password'] == md5($_POST['password'])) {
                 
            echo 'vous etes bien connecter.';

                    
                } else{


                  echo 'l\'utilisateur n\'ai pas reconnu';


              }
             $query->CloseCursor();  
                }
       
          }


                // recuperation des données pour les select

          if(isset($_POST["submitEnvoi"])){

      
             
                if ($_POST["checkboxConsultation"]== 'on') {
            
            
                 

                    $query = $db->prepare("SELECT distinct genre FROM stock");  
                  
    echo'checkbox';  
                    }
            
                  
            
                 }
            
            
            
            
            }
            

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
</head>


<body style="background-color: #ececec;">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">


                    <form method="POST"  class="row g-3 needs-validation">

                        <!-- select pour le genre  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Genre</option>
            <option></option>
          </select>
                        </div>


                        <!-- select pour le type de vetement  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Type vetement </option>
            <option>...</option>
          </select>

                        </div>


                        <!-- select pour le taille  -->

                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Taille </option>
            <option></option>
          </select>

                        </div>


                        <!-- select pour le couleur  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Couleur </option>
            <option>...</option>
          </select>

                        </div>



                        <!-- select pour le quantité  -->
                        <div class="col-md-3">
                            <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Qte </option>
            <option>...</option>
          </select>

                        </div>

                        <div class="col-12">
                            <div class="form-check">

                                <!-- checkbox Consultation -->
                                <input class="form-check-input" type="radio" name="checkboxConsultation" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Consultation
                                </label>
                            </div>
                            <div class="form-check">

                                <!-- checkbox pour les achats  -->
                                <input class="form-check-input" type="radio" name="checkboxAchat" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
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

</body>


</html>
