<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/produitC.php';
 
 $co = new produitC();
 if(isset($_GET['id'])){
   $produitC = new produitC();
   $listeC = $produitC->afficherProduitDetail($_GET['id']);
 
 foreach($listeC as $produit){
 ?>
 <body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="" method="post">
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
                <input type="text" class="field size1" name="nom" value=<?php echo $produit['nom'];?> />
              </p>
              <p> 
                <label>Type </label>
                <input type="text" class="field size1" name="type" value=<?php echo $produit['type'];?> />
              </p>


              <p> 
                <label>Prix </label>
                <input type="float" class="field size1" name="prix" value=<?php echo $produit['prix'];?> />
              </p>
              <p> 
                <label>Image </label>
                <input type="file" class="field size1" name="image" value=<?php echo $produit['image'];}?> />
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
 $produit = null;

 // create an instance of the controller

 $produitC = new produitC();
 if (
     isset($_POST["nom"]) && 
      isset($_POST["type"]) && 
     isset($_POST["prix"])&& 
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
        $produitC->modifierProduit($_GET['id'],$produit);
         
         header('Location:affichageProduit.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>