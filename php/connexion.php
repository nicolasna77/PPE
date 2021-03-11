<?php
// connexion a la bdd
include ("bdd/connectBdd.php"); 


//// verification si le bouton du formuliare a ete click
if(isset($_POST["submitFormConnexion"]))  
      {  

           //// verification si l'adresse mail et le mot de passe

           if(empty($_POST["email"]) && empty($_POST["password"]))  
           {  

           }elseif (empty($_POST["email"])) {
                    echo 'pas de mail';
                 } elseif (empty($_POST["password"])) {
                    echo 'pas de mot de passe ';
                
               
              
           }else  
           {  
              
                $query = $db->prepare("SELECT * FROM client  WHERE email = :email");  
                $query->bindValue(':email', $_POST['email'] ,PDO::PARAM_STR); 
                $query->execute();
                
                $data = $query->fetch();
               
                if ($data['password'] == md5($_POST['password'])) {

                 
                  $msg = "<script>$(document).ready(function() { M.toast({html: 'Connecter', classes:'rounded green'}) });</script>"; 

  
  header('Location: ./index.html');

                    
                } else{
                  $msg = '
                  <div class="row">
    <div class="col s12 m6">
                  <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                  <p>Une erreur s\'est produite 
                  pendant votre identification.<br /> Le mot de passe ou le pseudo 
                  </div>
                  </div>
                  </div> 
                  </div>
                  ';
              }
             $query->CloseCursor();  
                }
       
          }

 ?>  