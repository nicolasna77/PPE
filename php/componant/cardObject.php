<?php
    //recuperation des données pour les select

    if (isset($_POST["submitEnvoi"])) {

        ///si le bouton radio est cocher///
        if ($_POST["radio"] == 'consultaion'){

            $stock = $db->query("SELECT * FROM stock");

            while ($stocks = $stock->fetch()) {
              
              echo '<br>
              <div class="col">
                         <div class="card h-100" >
                            <img src="./css/image/th.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">' . $stocks["genre"] . '</h5>
                            <p class="card-text">' . $stocks["couleur"] . '</p>
                            <p class="card-text">' . $stocks["taille"] . '</p>
                            <p class="card-text">' . $stocks["quantite"] . '/piece</p>
                            <p class="card-text">' . $stocks["prix"] . '€</p>
                            </div>
                         </div>
                    </div>';
   }

$stock->closeCursor();
        };
        
        
        if ($_POST["radio"] == 'achat'){
            /// si achat est cocher 

           
        echo $_POST['quantite'];
        echo $_POST['genre'];
        echo $_POST['typeVet'];
        echo $_POST['taille'];
        echo $_POST['couleur'];    



        
        }
       
    } ?>