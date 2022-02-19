<?php

include_once '../Model/produit.php';
include_once '../Controller/produitC.php';
$produitC = new produitC();
$listeC = $produitC->afficherProduit();

$produitC = new produitC();
if (
    isset($_POST["nom"]) && 
     isset($_POST["type"]) && 
    isset($_POST["prix"]) &&
    isset($_POST["image"]) 
) {
    if (
        !empty($_POST["nom"]) && 
        !empty($_POST["type"]) && 
        !empty($_POST["prix"]) &&
        !empty($_POST["image"]) 
    ) {
        $produit = new produit(
            $_POST['nom'],
            $_POST['type'],
            $_POST['prix'],
            $_POST['image']
        );
        $produitC->ajouterProduit($produit);
        
        header('Location:affichageProduit.php');
    }
    else
        $error = "Missing information";
}
if (isset($_POST["rech"])&&isset($_POST["search"])) {
  if(!empty($_POST["rech"]))
  $listeC = $produitC->afficherProduitRech( $_POST['rech'],$_POST['selon']);
}
if (isset($_POST["tri"])) {
if(!empty($_POST["tri"]))
$listeC = $produitC->afficherProduitTrie( $_POST['tri']);
}
?>


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
               
                <th>REF</th>
                <th>Nom</th>
            
                <th>type</th>
                <th>prix</th>
                <th>image</th>
                
              
               
              </tr>

              

              <?php
    foreach($listeC as $produit){
        ?>


              <tr>
                <td><?php echo $produit['ref']; ?></td>
                <td><?php echo $produit['nom']; ?></td>
                 
                <td><?php echo $produit['type']; ?></td>
                <td><?php echo $produit['prix']; ?></td>
                <td><img  src="front/assets/images/<?php echo $produit['image']; ?>"width="50" height="60">
</td>
               
                <td><a href="supprimerProduit.php?id=<?php echo $produit['ref']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierProduit.php?id=<?php echo $produit['ref']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>
              
              
              
              
              
              
            
           
            </table>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
      
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              <p> 
                <label>Type </label>
                <input type="text" class="field size1" name="type" id="type"/>
              </p>


              <p> 
                <label>Prix </label>
                <input type="float" class="field size1" name="prix" id="prix" />
              </p>
              
              <p> 
                <label>image </label>
                <input type="file" class="field size1" name="image" id="image" />
              </p>
              

            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();"/>
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <form method="POST"><label>Sort by</label>
              <select name="tri" class="field" >
              
                <option value="nom">nom</option>
                <option value="type">type</option>
                <option value="prix">prix</option>
                
              </select><input type="submit"  value="trier"></form>
              
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <div id="piechart"> </div>
    <!-- Main -->
  </div>
</div>

<?php 
include_once "../Controller/produitC.php";
$produitC = new produitC();

$listeC = $produitC->statistiques();
 ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    
  var data = google.visualization.arrayToDataTable([
   
  [ 'role', 'nombre'],
  

  <?php
  foreach($listeC as $k){
   echo "["; echo "'";echo $k['type'];echo"'";echo",";echo $k['count(*)'];echo"],";}?>


  

  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'ROLES', 'width':750, 'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<!-- End Container -->
<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->





</body>
</html>
