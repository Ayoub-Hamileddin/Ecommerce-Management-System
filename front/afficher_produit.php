<?php
    require_once "../includes/data.php";
    $id=$_GET['id'];
$state=$pdo->prepare("SELECT * FROM produit where id=? ");
$state->execute([$id]);
$produit=$state->fetch(PDO::FETCH_ASSOC);
// *******/





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the categorie of || <?=$produit['libelle']?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
require_once '../includes/nav_front.php';

?>



        <div class="container">
            <div class="row mt-5">
              <div class="col-6">
                <img src="../upload/produit/<?=$produit['image']?>" alt="" class="img img-fluid w75" style="width:400px;height:400px;" >
              </div>
              <div class="col-6">
                <h2  ><?=$produit['libelle']?></h2>
                

                <?php
                if(!empty($produit['discount'])){
                    $prix=$produit['prix'];
                    $discount=$produit['discount'];
                    $total=$prix-($prix*$discount)/100;
                    ?>
                    <p>
                      <del class="badge text-bg-danger fs-2"><?=$produit['prix']?>Mad</del>
                    <span class="badge text-bg-success fs-4 mt-2 d-block w-25"><?=$total?> DH</span>
                    </p>
                    <?php
                }else{
                  ?>
                      <p class="badge text-bg-success fs-2"><?=$produit['prix']?>Mad</p>
                  
                  
                  <?php
                }
                ?>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero temporibus nihil atque nesciunt, vitae dolorum a cumque amet nisi asperiores harum exercitationem maiores doloribus error. Tempora nemo iusto neque minus.</p>
                <?php
                
                include'../includes/counter.php';
                ?>
                <a href="" class="btn btn-primary">ajouter au panier</a>
                
              </div>
            </div>
        </div>

   








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="../js/index.js" ></script>

</body>
</html>