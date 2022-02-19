<?php

include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
include_once '../../Model/produit.php';
include_once '../../Controller/produitC.php';
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';
include_once '../../Model/client.php';
include_once '../../Controller/clientC.php';

$clientC = new clientC();
$panierC = new panierC();
$produitC = new produitC();
$commandeC = new commandeC();
$listeeee = $clientC->selectConn();
foreach($listeeee as $c){$conn=$c['id'];}
$prix= null;
$adresse = null;
$listeC = $panierC->afficherPanierConn($conn);
if (isset($_POST["passer"]))
{
  foreach($listeC as $p)
  {
    $produit=$produitC->afficherProduitDetail($p['refProduit']);
    foreach($produit as $pro)
    {
    $prix=$prix+($pro['prix']*$p['quantite']);
    $client = $clientC->afficherClientDetail($p['idClient']);
    foreach($client as $c)
    {$adresse = $c['adresse'];
      }
    }
  }
  $commande = new commande(
    date('l jS \of F Y h:i:s A'),
    $adresse,
    $prix,
    $p['idClient']
  );
  $commandeC->ajouterCommande($commande);
  
  $panierC->supprimerPanierCmd($p['idClient'],$conn);
  header('Location:recu.php');
} 
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>fresh</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
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
      <!-- end header inner -->
      <!-- end header -->
      <div class="table">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
      
            <tr>
             
              <th>Produit</th>
              <th>Quantite</th>
          
              
              
            
             
            </tr>

            

           
<?php foreach($listeC as $pa){ ?>
            <tr>
              <td><?php $listpa=$produitC->afficherProduitDetail($pa['refProduit']);
              foreach($listpa as $po){ echo $po['nom']; }?></td>
              <td><?php echo $pa['quantite'] ?></td>
             
             
             
             
            
            
            
            
            </tr>
            <?php } ?>
            <tr> <td><form method="POST"><input type="hidden" name="passer" ><input type="submit" class="ico del" value="Passer commande"> </td></tr><form>
            
            
            
            
            
            
          
         
          </table>
          <!-- End Pagging -->
        </div>
 
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright 2019 All Right Reserved By <a href="https://html.design/"> Free  html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

