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
            
           }elseif (empty($_POST["email"])) {
/// verification que le mail soit bien entrer 
                    echo 'pas de mail';

                 } elseif (empty($_POST["password"])) {
                    
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
                 
            echo 'vous etes bien connecter';

//   header('Location: ./index.html');

                    
                } else{


                  echo 'lutilisateur n\'ai pas reconnu';


              }
             $query->CloseCursor();  
                }
       
          }
