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
if(isset(($_POST['ajouter']))){
    $libelle=$_POST["libelle"];
    $description=$_POST["description"];

    if(!empty($libelle) && !empty($description)){
        $state=$pdo->prepare("INSERT INTO categorie(libelle,description)VALUES(?,?)");
        $state->execute([$libelle,$description]);
        ?>
                <div class="alert alert-success" role="alert">
                        operetion successfuly!
                </div>
        
        
        <?php
    }else{
        ?>
       <div class="alert alert-danger" role="alert">
                    fields required!
     </div>
        
        <?php
    }
}



?>








<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg bg-" style="max-width:600px; width:100%">
        <h1 class="text-center bg-success text-light pb-2">ajouter categorie</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">libelle</label>
                <input type="text" class="form-control" name="libelle">
            </div>
            <div class="mb-4">
                <label  class="form-label  fw-bold">description</label>
                <textarea name="description" class="form-control" ></textarea>
            </div>
           <button type="submit" class="btn btn-primary" name="ajouter" >ajouter</button>
        </form>
        
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>