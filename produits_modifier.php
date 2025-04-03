<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    include "includes/nav.php";
    require_once "includes/data.php";
?>
<?php
$id=$_GET['id'];
$state=$pdo->prepare("SELECT * FROM produit where id=?");
$state->execute([$id]);
$preproduit= $state->fetch(PDO::FETCH_ASSOC);


?>






<?php
if(isset($_POST['modifier'])){
    $libelle=$_POST['libelle'];
    $prix=$_POST['prix'];
    $discount=$_POST['discount'];
    $categorie=$_POST['categorie'];
    $date=date('Y-m-d');
    $newid=$_POST['newid'];
    



    $filename='';
    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $filename=uniqid().$image;
        move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename) ;
    }

    if(!empty($libelle) && !empty($prix) &&!empty($discount) ){
        if(!empty($filename)){
                $state=$pdo->prepare('UPDATE produit SET libelle=?,prix=?,discount=?,id_categorie=?,image=? WHERE id=? ');
                $state->execute([$libelle, $prix, $discount,$categorie,$filename,$newid]);
                header('location:listeproduits.php');

        }else{
                $state=$pdo->prepare('UPDATE produit SET libelle=?,prix=?,discount=?,id_categorie=? WHERE id=? ');
                $state->execute([$libelle, $prix, $discount,$categorie,$newid]);
                header('location:listeproduits.php');

        }


       
        


        ?>
    
        
        
        
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
                requireds complete these <?php echo $libelle." ".$prix." ".$discount." ".$date ?>
        </div>

        <?php
    }
}



?>









<div class=" vh-100">
    <div class="card p-4 shadow-lg " style="max: width 800px; width:100%">
        <h1 class="text-center bg-success text-light pb-2">modifier produits</h1>
        <form method="post" enctype="multipart/form-data" >
                <input type="hidden" class="form-control" name="newid" value="<?php echo $preproduit['id']?>" >
            <div class="mb-3">
                <label class="form-label fw-bold">libelle</label>
                <input type="text" class="form-control" name="libelle" value="<?php echo $preproduit['libelle']  ?>"  >
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">prix</label>
                <input type="number" name="prix" class="form-control"  value="<?php echo $preproduit['prix']?>" >
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">image</label>
                <input type="file" name="image" class="form-control" >
                <img style="width: 250px;"  src="upload/produit/<?=$preproduit['image']?>" class="img-fluid">
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">discount</label>
                <input type="number" name="discount"   class="form-control" value="<?php echo $preproduit['discount']?>" >
            </div>
            <?php
            $state=$pdo->prepare("SELECT * FROM categorie");
            $state->execute();
            $categories=$state->fetchAll(PDO::FETCH_ASSOC);
             
            
            ?>
           
                <select name="categorie"  class="form-select mb-5">
                    <option value="<?php echo $preproduit['libelle']?>" class="fw-bold" >select your libelle:</option>
                    <?php 
                      foreach($categories as $categorie){
                        if($categorie['id']==$preproduit['id_categorie']){ 

                            echo" <option selected  value='".$categorie['id']."'>".$categorie['libelle']."</option>"  ;
            
                      }else{
                            echo" <option value='".$categorie['id']."'>".$categorie['libelle']."</option>"  ;

                      }
                      
                      }
                    ?>
                    
                </select>
                <button type="submit" name="modifier" class="btn btn-primary" >modifier</button>
        </form>
        
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>