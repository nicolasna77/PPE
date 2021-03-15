<?php

include ("bdd/connectBdd.php"); 

if(isset($_POST["submitEnvoi"])){

echo'ferfz';    
 
    if ($_POST["checkboxConsultation"]== 'on') {


        $query = $db->prepare("SELECT * FROM stock");  
        $query->execute();
        
        $data = $query->fetch();


        echo $data;

     }




}



?>