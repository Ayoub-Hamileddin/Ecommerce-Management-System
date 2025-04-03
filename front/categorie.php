<?php
    require_once "../includes/data.php";
    $id=$_GET['id'];
$state=$pdo->prepare("SELECT * FROM categorie where id=? ");
$state->execute([$id]);
$categorie=$state->fetch(PDO::FETCH_ASSOC);
// *******/
$state=$pdo->prepare("SELECT * FROM produit where id_categorie=? ");
$state->execute([$id]);
$produits=$state->fetchAll(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the categorie of |<?php echo$categorie['libelle'] ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
require_once '../includes/nav_front.php';

?>

<h1 class="text-dark text-center " ><?php echo$categorie['libelle'] ?></h1>


        <div class="container">
            <div class="row">
                <?php
            foreach ($produits as $produit) {
                    ?>
                    <div class=" card mb-3 col-md-4 ">
                        <img src="../upload/produit/<?=$produit['image']?>" class="card-img-top img-fluid" style="height: 200px;" alt="..." >
                        <div class="card-body">
                            <a class="btn stretched-link" href="./afficher_produit.php?id=<?=$produit['id']?>"></a>
                            <h5 class="card-title"><?=$produit['libelle']?></h5>
                            <p class="card-text"><?=$produit['prix']?></p>
                            <p class="card-text"><small class="text-body-secondary"><?php  echo date_format(date_create( $produit['date_creation']),'Y-m-d') ?></small></p>
                        </div>
                        <div class="card-footer" style="z-index: 1000;">
                            <?php  
                            include '../includes/counter.php'
                            ?>
                        </div>
                    </div>
                     <?php
                     }
                    ?>
            </div>
        </div>

   








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="../js/index.js" ></script>
</body>
</html>