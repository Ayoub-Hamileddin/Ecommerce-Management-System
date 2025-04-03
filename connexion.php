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
if(isset($_POST["connexion"])){
    $login=$_POST["login"];
    $pwd=$_POST["password"];
    if(!empty($login)&& !empty($pwd) ){
        $state=$pdo->prepare("SELECT * FROM utilisateur WHERE login=? AND password=? ");
        $state->execute([ $login, $pwd]);   
        if($state->rowCount()==1){
            session_start();
            $_SESSION['utilisateur']=$state->fetch();
            header("location:admin.php");
        }else{
            ?> 
             <div class="alert alert-danger" role="alert">
                   email or password inccorecte
             </div>
            <?php
        }
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
    <div class="card p-4 shadow-lg bg-" style="max-width:400px; width:100%">
        <h1 class="text-center bg-success text-light pb-2">connexion</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">email</label>
                <input type="email" class="form-control" name="login">
            </div>
            <div class="mb-4">
                <label for="" class="form-label  fw-bold">password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="connexion" >connexion</button>
                <a href="./index.php" class="btn btn-warning">log in</a>
            </div>
        </form>
        
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>