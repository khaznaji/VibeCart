<?php
include_once '../../Controller/produitC.php';
 
 $co = new produitC();
 
   $produitC = new produitC();
   $liste = $produitC->afficherProduitDetail($_GET['ref']); 
   foreach($liste as $pr){
  
 ?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pixie - Product Detail</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
     <!-- bootstrap css -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->

  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Suspendisse laoreet magna vel diam lobortis imperdiet</span>
          </div>
        </div>
      </div>
    </div>

    <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                             
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="panier.php">Panier</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="logout.php"> Logout</a>
                              </li>
                             
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Single Product</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                 
                  <li>
                    <img src="assets/images/<?php echo $pr['image']; ?>" />
                  </li>
                 
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
            <form action="ajoutPa.php" method="get" >
              <h4><?php echo $pr['nom']; ?></h4>
              <h6><?php echo $pr['prix']; ?> DT</h6>
              <p><?php echo $pr['nom']; ?> </p>
              <input name="ref" type="hidden" class="quantity-text"  id="ref" value="<?php echo $pr['ref']; ?>"
                	>
                 
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="quantity" class="quantity-text"  id="quantity"
                	>
                <input type="submit" class="button" value="Ajouter au panier!">
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Type: <span><?php echo $pr['type'];}?></span></h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Single Page Ends Here -->

<style>
  .single-product .right-content .button {
    font-size: 17px;
    background-color: #ffa30f;
    color: #fff;
    padding: 13px 0px;
    width: 100%;
    max-width: 190px;
    text-align: center;
    display: inline-block;
    transition: ease-in all 0.5s;
    z-index: 9999;
    position: relative;
    font-weight: 300;
}
.col-md-12
{
  background-color: transparent;
}
#pre-header
{
  background-color: #ffa30f;
}

</style>
    


    

    
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
<?php

if (
  isset($_POST["quantity"]) 
) {
  
     
  header('Location:index.php');
  }

?>