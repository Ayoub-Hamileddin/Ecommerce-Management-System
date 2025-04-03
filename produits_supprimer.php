<?php
require_once "includes/data.php";
$id=$_GET['id'];
$state=$pdo->prepare('DELETE FROM produit where id=?');
$supprime=$state->execute([$id]);
if($supprime){
    header('location:listeproduits.php');
}else{
    echo'error';
}


?>