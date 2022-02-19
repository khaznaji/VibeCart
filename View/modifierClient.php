<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/clientC.php';
 
 $co = new clientC();
 if(isset($_GET['id'])){
   $clientC = new clientC();
   $listeC = $clientC->afficherClientDetail($_GET['id']);
 
 foreach($listeC as $client){
 ?>
 <body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="#" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value=<?php echo $client['nom'];?> />
              </p>
              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" value=<?php echo $client['numtel'];?> />
              </p>


              <p> 
                <label>Email </label>
                <input type="email" class="field size1" name="email" value=<?php echo $client['email'];?> />
              </p>
              <p> 
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" value=<?php echo $client['adresse'];?> />
              </p>
              <p> 
                <label>Mot de passe </label>
                <input type="text" class="field size1" name="mdp" value=<?php echo $client['mdp'];}?> />
              </p>

             

             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 <?php
 // create event
 $client = null;

 // create an instance of the controller
echo('dd');
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
        $clientC->modifierClient($_GET['id'],$client);
         
         header('Location:affichageClient.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>