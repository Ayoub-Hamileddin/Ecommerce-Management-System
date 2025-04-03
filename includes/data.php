<?php
try{
$pdo=new PDO('mysql:host=localhost;dbname=ecommerce','root','');
}catch(PDOException $e){
    echo"error".$e->getMessage();
    die();
}





?>