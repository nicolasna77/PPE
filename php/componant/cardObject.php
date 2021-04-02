<?php
//affichage des produit de la base 
if (isset($_POST["submitEnvoi"])) {
    ///si le bouton radio est cocher///
    if ($_POST["radio"] == 'consultaion') {

        $stock = $db->query("SELECT * FROM stock");

        while ($stocks = $stock->fetch()) {

            echo '<br>
              <div class="col">
                         <div class="card h-100" >
                         <div class="card-img-top">
                         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                      
                         <div class="carousel-inner">
                           <div class="carousel-item active">
                           <img src="./css/image/th.jpg" class="card-img-top" alt="...">
                           </div>
                           <div class="carousel-item">
                           <img src="./css/image/th.jpg" class="card-img-top" alt="...">
                           </div>
                           <div class="carousel-item">
                           <img src="./css/image/th.jpg" class="card-img-top" alt="...">
                           </div>
                         </div>
                         </div>
                         <div class="carousel-indicators">
                         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                       </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                         </button>
                       </div>
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
// 
    //

    if ($_POST["radio"] == 'achat') {
        /// si achat est cocher 

        if ($_POST['quantite'] == '0') {

            echo 'qte';
        }
        elseif(!empty($_POST['genre'])) {

            echo 'genre';
        }
        elseif(!empty($_POST['typeVet'])) {

            echo 'typevet';
        }
        elseif(!empty($_POST['taille'])) {

            echo 'taille';
        }
        elseif(!empty($_POST['couleur'])) {

            echo 'couleur';
        }
        
        echo $_POST['genre'];
        echo $_POST['typeVet'];
        echo $_POST['taille'];
        echo $_POST['couleur'];
    }
}
