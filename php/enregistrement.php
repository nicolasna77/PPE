<?php 

echo 'koko';



if(isset($_POST["submitFormEnregistrement"])) {


    if(empty($_POST['nom'])) {

    echo ("Le champ nom est vide");

    }
    else {
    echo "Le champ nom est rempli";
    }

   

}

else {
 echo "Passer par la page enregistrement";
}



?>