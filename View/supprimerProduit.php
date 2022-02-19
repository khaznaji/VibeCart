<?php
 include_once '../Controller/produitC.php';
 $co = new produitC();
 if(isset($_GET['id'])){
     $co->supprimerProduit($_GET['id']);
 
    header('Location:affichageProduit.php');
    }

 ?>