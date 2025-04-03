<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php 
    require_once "includes/nav.php"
    
    ?>
   <div class="container mt-5">
     <table class="table table-striped table-hover">
         <thead>
             <th>#id</th>
             <th>libelle</th>
             <th>description</th>
             <th>date</th>
             <th>operation</th>
             
         </thead>
         <tbody>
             <?php
             require_once "includes/data.php";
             $categorys=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
             foreach($categorys as $categories){
              ?>
              <td><?php echo $categories['id']?></td>
              <td><?php echo $categories['libelle']?></td>
              <td><?php echo $categories['description']?></td>
              <td><?php echo $categories['date_creation']?></td>
              <td>  
                 <a href="categorie_supprimer.php?id=<?php echo$categories['id'] ?>"  onclick=" return confirm('voulez vous supprimer la categorie <?php echo $categories['libelle']?> ') "  class="btn btn-danger">supprimer</a>
                 <a href="categorie_modifier.php?id=<?php echo$categories['id'] ?>"  class="btn btn-success" >modifier</a>
              </td>
                </tbody>
              
              <?php
    
    
             }
             
             ?>
    
       
      </table>
   </div class="container">
</body>
</html>