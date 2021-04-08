<script>var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel)</script>
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
                        
                         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                         <div class="carousel-inner">
                           <div class="carousel-item active">
                           <img src="./css/image/th.jpg" class="card-img-top" alt="...">
                           </div>
                           <div class="carousel-item">
                           <img src="./css/image/vet.jpg" class="card-img-top" alt="...">
                           </div>
                           <div class="carousel-item">
                           <img src="./css/image/th.jpg" class="card-img-top" alt="...">
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
                            <h5 class="card-title ">' . $stocks["typeVet"] . '</h5>
                            </br>
                            <table class="table table-striped table-borderless">
                            <tbody>
                                 <tr>
                                    <th scope="row">Genre :</th>
                                    <td>' . $stocks["genre"] . '</td>
                            
                                </tr>
                                <tr>
                                    <th scope="row">Couleur :</th>
                                    <td>' . $stocks["couleur"] . '</td>
                                </tr>
                                <tr>
                                    <th scope="row">Quantite disponible :</th>
                                    <td>' . $stocks["quantite"] . '</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prix :</th>
                                    <td >' . $stocks["prix"] . ' €</td>
                                </tr>
                                <tr>
                                    <th scope="row">idstock :</th>
                                    <td >' . $stocks["idStock"] . '</td>
                                </tr>
                            </tbody>
                            </table>
                         
                            </div>
                         </div>
                         </div>
                    </div>';
               

        }

        $stock->closeCursor();
    };
// 
    //

    if ($_POST["radio"] == 'achat') {
        //si achat est cocher 

        if ($_POST['quantite'] == 0) {

            echo 'Choisir quantite';
        }

        elseif(empty($_POST['genre'])) {

            echo $_POST['genre'];
            
        }
        elseif(empty($_POST['typeVet'])) {

            echo 'typevet';
        }
        elseif(empty($_POST['taille'])) {

            echo 'taille';
        }
        elseif(empty($_POST['couleur'])) {

            echo 'couleur';
        }
        
       



    
        $req = $db->prepare('SELECT idStock FROM stock WHERE genre = ? AND typeVet = ? AND taille = ? AND couleur = ?');
        $req->execute(array($_POST['genre'],$_POST['typeVet'],$_POST['taille'],$_POST['couleur']));

        echo '<ul>';
        while ($donnees = $req->fetch())
        {
	    echo '<li>' . $donnees['idStock'] . '';

        

        }

        
        

    

$req->closeCursor();


        
        

        

        
        
        


        
        

    
       
    
        

       



    
        
        

    
    





        // $sql = "UPDATE users SET genre=?, typeVet=?, taille=?, couleur=? WHERE id=?";
        // $stmt= $pdo->prepare($sql);
        // $stmt->execute([$name, $surname, $sex, $id]);




       
       
        // echo $_POST['genre'];
        // echo $_POST['typeVet'];
        // echo $_POST['taille'];
        // echo $_POST['couleur'];
    }
}
?>
