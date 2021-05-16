<script>var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel)</script>
<?php
//affichage des produit de la base 
if (isset($_POST["submitEnvoi"])) {
    ///si le bouton radio consultation est cocher alors ont affiche toute la table ///
    if ($_POST["radio"] == 'consultaion') {



        // select pour afficher toute la table stock sous forme de card  //
        $stock = $db->query("SELECT * FROM stock");

        while ($stocks = $stock->fetch()) {

            echo '<br>
              <div class="col">
                         <div class="card h-100" >
                        
                         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                         <div class="carousel-inner">
                         
                         
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
                                    <th scope="row">Taille disponible :</th>
                                    <td>' . $stocks["taille"] . '</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prix :</th>
                                    <td >' . $stocks["prix"] . ' </td>
                                </tr>
                                <tr>
                                    <th scope="row">idStock :</th>
                                    <td >' . $stocks["idStock"] . ' </td>
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

    // si le bouton radio achat est cocher //
    if ($_POST["radio"] == 'achat') {
        //si achat est cocher 

        if ($_POST['quantite'] == 0) {

            echo '

            <div class="card h-100"  >
                            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
            <div class="carousel-inner">
             
            
          </div>
               <div class="card-body">
               <h5 class="card-title "> Vous devez choisir une quantité </h5>
               </br>
               <table class="table table-striped table-borderless">
               <tbody>
               </tbody>
               </table>
            
               </div>
            </div>
            </div>';
        }

        elseif(empty($_POST['genre'])) {

            echo '
            <div class="card h-100"  >
                            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
            <div class="carousel-inner">
             
            
          </div>
               <div class="card-body">
               <h5 class="card-title "> Vous devez choisir un genre </h5>
               </br>
               <table class="table table-striped table-borderless">
               <tbody>
               </tbody>
               </table>
            
               </div>
            </div>
            </div>';
        }
        elseif(empty($_POST['typeVet'])) {


            echo '

            <div class="card h-100"  >
                            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
            <div class="carousel-inner">
             
            
          </div>
               <div class="card-body">
               <h5 class="card-title "> Vous devez choisir un type de vêtement </h5>
               </br>
               <table class="table table-striped table-borderless">
               <tbody>
               </tbody>
               </table>
            
               </div>
            </div>
            </div>';
        }
        elseif(empty($_POST['taille'])) {

            echo '

            <div class="card h-100"  >
                            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
            <div class="carousel-inner">
             
            
          </div>
               <div class="card-body">
               <h5 class="card-title "> Vous devez choisir une taille </h5>
               </br>
               <table class="table table-striped table-borderless">
               <tbody>
               </tbody>
               </table>
            
               </div>
            </div>
            </div>';
        }
        elseif(empty($_POST['couleur'])) {

            echo '

            <div class="card h-100"  >
                            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
            <div class="carousel-inner">
             
            
          </div>
               <div class="card-body">
               <h5 class="card-title "> Vous devez choisir une couleur </h5>
               </br>
               <table class="table table-striped table-borderless">
               <tbody>
               </tbody>
               </table>
            
               </div>
            </div>
            </div>';
        }


        
    else {


        
        // select de l'id de l'article demander //
        $req = $db->prepare('SELECT * FROM stock WHERE genre = ? AND typeVet = ? AND taille = ? AND couleur = ?');
        $req->execute(array($_POST['genre'],$_POST['typeVet'],$_POST['taille'],$_POST['couleur']));

        echo '<ul>';
        while ($donnees = $req->fetch())
        {
	    if ($donnees['quantite'] > $_POST['quantite']) {
   
        // soustraction de la quantite demander a la quantite disponible //

            $qte = ($donnees['quantite'] - $_POST['quantite']);
       /// update de la quantite //
            $stmt = $db->prepare("UPDATE stock SET  quantite =$qte WHERE idStock = :idStock");                                  
            // $stmt->bindParam(':quantite', $qte, PDO::PARAM_INT);       
            $stmt->bindParam(':idStock', $donnees['idStock'], PDO::PARAM_INT);    
            $stmt->execute();  
         }else{
            echo 'la quantité n\'ai pas disponible';
         }

         }
        
        // select pour afficher la card modifier //

        
        
        $req = $db->prepare('SELECT * FROM stock WHERE genre = ? AND typeVet = ? AND taille = ? AND couleur = ?');
        $req->execute(array($_POST['genre'],$_POST['typeVet'],$_POST['taille'],$_POST['couleur']));

        echo '<ul>';
        while ($donnees = $req->fetch())
        {

        echo '

        <div class="card h-100"  >
                        
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
         
        
      </div>
           <div class="card-body">
           <h5 class="card-title ">' . $donnees["typeVet"] . '</h5>
           </br>
           <table class="table table-striped table-borderless">
           <tbody>
                <tr>
                   <th scope="row">Genre :</th>
                   <td>' . $donnees["genre"] . '</td>
           
               </tr>
               <tr>
                   <th scope="row">Couleur :</th>
                   <td>' . $donnees["couleur"] . '</td>
               </tr>
               <tr>
                   <th scope="row">Quantite disponible :</th>
                   <td>' . $donnees["quantite"] . '</td>
               </tr>
               <tr>
                   <th scope="row">Prix :</th>
                   <td >' . $donnees["prix"] . ' €</td>
               </tr>
               <tr>
                   <th scope="row">id :</th>
                   <td >' . $donnees["idStock"] . '</td>
               </tr>
           </tbody>
           </table>
        
           </div>
        </div>
        </div>';






       }




        

   

        
        

    

$req->closeCursor();


        
        

        

        
        
        


        
        

    
       
    
        

       



    
        
        

    
    





        // $sql = "UPDATE users SET genre=?, typeVet=?, taille=?, couleur=? WHERE id=?";
        // $stmt= $pdo->prepare($sql);
        // $stmt->execute([$name, $surname, $sex, $id]);




       
       
        // echo $_POST['genre'];
        // echo $_POST['typeVet'];
        // echo $_POST['taille'];
        // echo $_POST['couleur'];
    }}
}
?>
