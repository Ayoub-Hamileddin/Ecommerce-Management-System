<?php
session_start();
$connect=false;
if(isset($_SESSION["utilisateur"])){
  $connect=true;
}


?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav ms-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">ajouter utilisateur</a>
        </li>
        <?php
        if($connect){
          ?>
            <li class="nav-item">
            <a class="nav-link" href="./ajouterproduits.php">ajouter produits</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="./listeproduits.php">liste des produits</a>
          </li>
           
          <li class="nav-item">
            <a class="nav-link" href="./ajoutercategorie.php">ajouter categorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./listeCategories.php">liste des categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./deconnexion.php">deconnexion</a>
          </li>
          
          <?php
        }else{
          ?>
            <li class="nav-item ">
              <a class="nav-link" href="connexion.php">connexion</a>
            </li>
          <?php
        }
        
        ?>
        
        
      </ul>
    </div>
  </div>
</nav>