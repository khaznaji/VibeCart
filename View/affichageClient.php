<?php

include_once '../Model/client.php';
include_once '../Controller/clientC.php';
$clientC = new clientC();
$listeC = $clientC->afficherClient();

$clientC = new clientC();
if (
    isset($_POST["nom"]) && 
     isset($_POST["numtel"]) && 
    isset($_POST["email"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["mdp"]) 
) {
    if (
        !empty($_POST["nom"]) && 
        !empty($_POST["numtel"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["mdp"]) 
    ) {
        $client = new client(
            $_POST['nom'],
            $_POST['email'],
            $_POST['numtel'],
            $_POST['adresse'],
            $_POST['mdp']
        );
        $clientC->ajouterClient($client);
        
        header('Location:affichageClient.php');
    }
    else
        $error = "Missing information";
}
if (isset($_POST["rech"])&&isset($_POST["search"])) {
  if(!empty($_POST["rech"]))
  $listeC = $clientC->afficherClientRech( $_POST['rech'],$_POST['selon']);
}
if (isset($_POST["tri"])) {
if(!empty($_POST["tri"]))
$listeC = $clientC->afficherClientTrie( $_POST['tri']);
}
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

body {
    font-family: 'Open Sans', sans-serif
}

.search {
    top: 6px;
    left: 10px
}

.form-control {
    border: none;
    padding-left: 32px
}

.form-control:focus {
    border: none;
    box-shadow: none
}

.green {
    color: green
}
</style>
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
             <form method="POST" action="affichageClient.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="det"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
              
              <option value="nom">nom</option>
              <option value="email">prenom</option>
              <option value="numtel">numtel</option>
              
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>ID</th>
                <th>Nom</th>
            
                <th>Email</th>
                <th>Numtel</th>
                <th>Adresse</th>
                
              
               
              </tr>

              

              <?php
    foreach($listeC as $client){
        ?>


              <tr>
                <td><?php echo $client['id']; ?></td>
                <td><?php echo $client['nom']; ?></td>
                 
                <td><?php echo $client['email']; ?></td>
                <td><?php echo $client['numtel']; ?></td>
                <td><?php echo $client['adresse']; ?></td>
               
                <td><a href="supprimerClient.php?id=<?php echo $client['id']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierClient.php?id=<?php echo $client['id']; ?>" class="ico edit">Edit</a>
               
              
              
              
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
                <label>numtel </label>
                <input type="number" class="field size1" name="numtel" id="numtel"/>
              </p>


              <p> 
                <label>Email </label>
                <input type="email" class="field size1" name="email" id="email" />
              </p>
              <p> 
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" id="adresse" />
              </p>

              <p> 
                <label>Mdp </label>
                <input type="password" class="field size1" name="mdp" id="mdp" />
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
                <option value="email">email</option>
                <option value="numtel">numtel</option>
                
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
include_once "../Controller/clientC.php";
$clientC = new clientC();

$listeC = $clientC->statistiques();
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
   echo "["; echo "'";echo $k['email'];echo"'";echo",";echo $k['count(*)'];echo"],";}?>


  

  
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
