<?php





$stock = $db->query("SELECT * FROM stock"); 

while($stocks = $stock->fetch())
{

   echo' <br>
<div class=" row-cols-5  row-cols-md-2 g-7">
    <div class="col row-cols-2">

        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$stocks["genre"].'</h5>
                <p class="card-text">'.$stocks["couleur"].'</p>
            </div>




        </div>

    </div>

</div>';
}