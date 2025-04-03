<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    include "includes/nav.php";
    require_once "includes/data.php";
?>
<?php
$id=$_GET['id'];
$state=$pdo->prepare("SELECT * FROM categorie WHERE id=?");
$state->execute([$id]);
$categorie=$state->fetch(PDO::FETCH_ASSOC);
?>

<?php
if(isset($_POST["modifier"])){
    $libelle=$_POST['libelle'];
    $description=$_POST['description'];
    $newid=$_POST['newid'];
    if(!empty($libelle) && !empty($description)){
        $state=$pdo->prepare('UPDATE categorie SET libelle=?,description=? WHERE id=?');
        $state->execute([$libelle,$description,$newid]);
        header('location:listeCategories.php');
    }else{
        echo 'error 404';
    }
}

?>









<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg bg-" style="max-width:600px; width:100%">
        <h1 class="text-center bg-success text-dark pb-2">modifier categorie</h1>
        <form method="post">
                <input type="hidden" class="form-control" name="newid" value="<?php echo $categorie['id']?>">
            <div class="mb-3">
                <label class="form-label fw-bold">libelle</label>
                <input type="text" class="form-control" name="libelle" value="<?php echo $categorie['libelle']?>">
            </div>
            <div class="mb-4">
                <label  class="form-label  fw-bold">description</label>
                <textarea name="description" class="form-control" ><?php echo $categorie['description']?></textarea>
            </div>
           <button type="submit" class="btn btn-primary" name="modifier">modifier</button>
        </form>
        
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>