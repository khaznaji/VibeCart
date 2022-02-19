<?php

include_once '../Model/commande.php';
include_once '../Controller/commandeC.php';
$commandeC = new commandeC();
$listeC = $commandeC->afficherCommnade();?>
<link rel="stylesheet" href="style.css" type="text/css" media="all" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<script src="js/saisie.js"></script>
<body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">TShop</a></h1>
      <div id="top-navigation"> Welcome <a href="#"><strong>Administrator</strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="#">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
    <ul>
        <li><a href="affichageAdmin.php" class="active"><span>Gestion admins</span></a></li>
        <li><a href="affichageClient.php" class="active"><span>Gestion clients</span></a></li>
        <li><a href="affichageProduit.php" class="active"><span>Gestion produits</span></a></li>
      
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
    
    <!-- End Message OK -->
    <!-- Message Error -->
    
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
       
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
             <form method="POST" action="affichageProduit.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="det"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
              
              <option value="nom">nom</option>
              <option value="type">type</option>
              <option value="prix">prix</option>
              
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>date_cmd</th>
                <th>Adresse</th>
            
                <th>prix</th>
                <th>idClient</th>
                
              
               
              </tr>
              <?php
    foreach($listeC as $commande){
        ?>


              <tr>
                <td><?php echo $commande['date_cmd']; ?></td>
                <td><?php echo $commande['adresse']; ?></td>
                 
                <td><?php echo $commande['prix']; ?></td>
                <td><?php echo $commande['idClient']; ?></td>
                <td><img  src="front/assets/images/<?php echo $produit['image']; ?>"width="50" height="60">
</td>
               
                <td><a href="supprimerProduit.php?id=<?php echo $produit['ref']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierProduit.php?id=<?php echo $produit['ref']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>