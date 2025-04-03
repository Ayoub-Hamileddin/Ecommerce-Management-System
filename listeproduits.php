<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php 
    require_once "includes/nav.php"
    
    ?>
    <h1 class="p-4 text-center" >liste des produits:</h1>
    <a href="./ajouterproduits.php" class="btn btn-primary m-3 float-end"> ajouter produits:</a>
   <div class="container mt-5">
     <table class="table table-striped table-hover">
         <thead>
             <th>#id</th>
             <th>libelle</th>
             <th>prix</th>
             <th>discount(prix finale)</th>
             <th>categorie</th>
             <th>image</th>
             <th>date</th>
             
         </thead>
         <tbody>
             <?php
             require_once "includes/data.php";
             $produits=$pdo->query('SELECT produit.*,categorie.libelle as"categorie_libelle" FROM produit inner join categorie ON produit.id_categorie = categorie.id ')->fetchAll(PDO::FETCH_ASSOC);
             
             foreach($produits as $produit){
                $discount= $produit['discount'];
                $prix= $produit['prix'];
                $prixFinal= $prix-(($prix*$discount)/100);
              ?>
              <td><?=$produit['id']?></td>
              <td><?=$produit['libelle']?></td>
              <td><?=$prix ?></td>
              <td><?=$prixFinal ?></td>
              <td><?=$produit['categorie_libelle']?></td>
              <td><img src="upload/produit/<?=$produit['image']?>" style="width:70px;height:70px;" ></td>
              <td><?=$produit['date_creation']?></td>
              <td>  
                 <a href="./produits_modifier.php?id=<?=$produit['id']?>" class="btn btn-success" >modifier</a>
                 <a href="./produits_supprimer.php?id=<?=$produit['id']?>" class="btn btn-danger"  onclick="return confirm('voulez vous supprimer cette produit <?php echo $produit['libelle']?> ')" >supprimer</a>
              </td>
                </tbody>
              
              <?php
    
    
             }
             
             ?>
    
       
      </table>
   </div class="container">
</body>
</html>