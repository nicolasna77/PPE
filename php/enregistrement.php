<?php 
    include ("bdd/connectBdd.php");


if(empty($_POST['nom']) xor empty($_POST['prenom'])) {
    echo "Le champ nom ou prenom n'est pas rempli <br>";
}

if ((empty($_POST['nom'])) and (empty($_POST['prenom']))){
    echo "Plusieurs champs ne sont pas remplis  <br>";
}

if (empty($_POST['email'])){
    echo "veuillez entrez un email <br>";
}

if (empty($_POST['password'])){
    echo "Veuillez choisir un mot de passe <br>";
   
}



if (empty($_POST['passwordValid'])){

    echo "Veuillez confirmer le mdp <br>";
}

if ($_POST["password"]!=$_POST["passwordValid"]){

    echo "les mots de passes sont differents <br>";
}


if (($_POST["password"])==(isset($_POST["passwordValid"]))){

    echo "les mots de passes sont ok <br>";
}






if(isset($_POST["submitFormEnregistrement"])) {

    $nom = $_POST['nom'];

    $prenom = $_POST['prenom'];

    $email = ($_POST['email']);

    $passHache = md5($_POST['password']); 

    $query = $db->prepare('INSERT INTO connexions(nom, prenom, email, password) VALUE (:nom,:prenom,:email,:passHache)');

    $query->bindValue(':nom', $nom, PDO::PARAM_STR);

    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);

    $query->bindValue(':email', $email, PDO::PARAM_STR);

    $query->bindValue(':passHache',  $passHache, PDO::PARAM_STR);

    $query->execute();
    

}else{
    
}



?>