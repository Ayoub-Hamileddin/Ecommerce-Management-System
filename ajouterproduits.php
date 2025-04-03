<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    include "includes/nav.php";
    require_once "includes/data.php";
?>
<?php
if(isset($_POST['ajouter'])){
    $libelle=$_POST['libelle'];
    $prix=$_POST['prix'];
    $discount=$_POST['discount'];
    $categorie=$_POST['categorie'];
    $date=date('Y-m-d');



     $filename='produit.webp';
    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $filename=uniqid().$image;
        move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename) ;
    }else{
         $filename='produit.webp';
    }


    if(!empty($libelle) && !empty($prix) && !empty($date)){
        $state=$pdo->prepare('INSERT INTO produit values (null,?,?,?,?,?,?)');
        $state->execute([$libelle, $prix, $discount,$categorie, $date,$filename]);
        ?>
        <div class="alert alert-success">
                requireds successfuly
        </div>
        
        
        
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
        <h1 class="text-center bg-success text-light pb-2">AJOUTER PRODUITS</h1>
        <form method="post" enctype="multipart/form-data" >
            <div class="mb-3">
                <label class="form-label fw-bold">libelle</label>
                <input type="text" class="form-control" name="libelle">
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">prix</label>
                <input type="number" name="prix" class="form-control" >
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">image</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">discount</label>
                <input type="number" name="discount"   class="form-control">
            </div>
            <?php
            $state=$pdo->prepare("SELECT * FROM categorie");
            $state->execute();
            $categories=$state->fetchAll(PDO::FETCH_ASSOC);
             
            
            ?>
            <!-- <select name='categorie'  class='form-control mb-4'>
                -->
                <select name="categorie"  class="form-select mb-5">
                    <option value="" class="fw-bold" >select your libelle:</option>
                    <?php 
                      foreach($categories as $categorie){

                            echo" <option  value='".$categorie['id']."'>".$categorie['libelle']."</option>"  ;
            
                      }
                      
                    
                    ?>
                    
                </select>
                <button type="submit" name="ajouter" class="btn btn-primary" >ajouter</button>
        </form>
        
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>