<?php 
include ("bdd/connectBdd.php");




if(isset($_POST["submitFormEnregistrement"])) {
}
else {
    echo "Passer par la page enregistrement <br>";
}       




if(empty($_POST['nom']) xor empty($_POST['pren'])) {
    echo "Le champ nom ou prenom n'est pas rempli <br>";
}

if ((empty($_POST['nom'])) and (empty($_POST['pren']))){
    echo "Plusieurs champs ne sont pas remplis  <br>";
}

if (empty($_POST['inputPassword'])){
    echo "Veuillez choisir un mot de passe <br>";
   
}


if (empty($_POST['inputEmail'])){
    echo "veuillez entrez un email <br>";
}



if ($_POST["inputPassword"]==$_POST["inputPasswordvalid"]){
    echo "carré";
}

}






?>