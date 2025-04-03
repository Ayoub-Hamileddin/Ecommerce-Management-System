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
if(isset($_POST["ajouter"])){
    $login=$_POST["login"];
    $pwd=$_POST["password"];
    if(!empty($login)&& !empty($pwd) ){
      $date=date("Y-m-d");
        $state=$pdo->prepare("INSERT INTO utilisateur VALUES(null,?,?,?)");
        $state->execute([ $login, $pwd,$date]);   
        header("location:connexion.php"); 
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            required fields
        </div>

        <?php  
    }
}
?>



<div class="d-flex justify-content-center align-items-center vh-100 bg-muted ">
    <div class="card p-4 shadow-lg bg-" style="max-width:600px; width:100%">
        <h1 class="text-center bg-info text-secondary">log in</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">email</label>
                <input type="email" class="form-control" name="login">
            </div>
            <div class="mb-4">
                <label for="" class="form-label  fw-bold">password</label>
                <input type="password" class="form-control" name="password">
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