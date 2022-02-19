<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/adminC.php';
 
 $co = new adminC();
 if(isset($_GET['id'])){
   $adminC = new adminC();
   $listeC = $adminC->afficherAdminDetail($_GET['id']);
 
 foreach($listeC as $admin){
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
                <input type="text" class="field size1" name="nom" value=<?php echo $admin['nom'];?> />
              </p>
             
              <p> 
                <label>Email </label>
                <input type="email" class="field size1" name="email" value=<?php echo $admin['email'];?> />
              </p>
              
              <p> 
                <label>Mot de passe </label>
                <input type="text" class="field size1" name="mdp" value=<?php echo $admin['mdp'];}?> />
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
 $admin = null;

 // create an instance of the controller

 $adminC = new adminC();
 if (
     isset($_POST["nom"]) && 
     isset($_POST["email"]) &&
     isset($_POST["mdp"])
 ) {
     if (
         !empty($_POST["nom"]) && 
         !empty($_POST["email"]) &&
         !empty($_POST["mdp"]) 
     ) {
         $admin = new admin(
             $_POST['nom'],
             $_POST['email'],
             $_POST['mdp']
         );
        $adminC->modifierAdmin($_GET['id'],$admin);
         
         header('Location:affichageAdmin.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>