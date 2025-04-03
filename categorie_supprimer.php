<?php
require_once "includes/data.php";
$id=$_GET["id"];
echo"".$id."";
$state=$pdo->prepare("DELETE FROM categorie where id=?");
$supprime=$state->execute([$id]);
if($supprime){
    header("location:listeCategories.php");
}else{
    echo"error";
}


?>