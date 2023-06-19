<?php
$startdate = isset($_GET['startdate']) ? $_GET['startdate'] : date('y-m-d');
$enddate = isset($_GET['enddate']) ? $_GET['enddate'] : date('y-m-d', strtotime('+3 days'));
$age = isset($_GET['age']) ? $_GET['age'] : '24';
$cars = file_get_contents("cars.json");
  // Convertir les données JSON en tableau associatif
  $cars = json_decode($cars, true)['cars'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="">
<title>CAR RENTAL VEHICULES- Le leader de location de voiture à Aéroport international Mohammed V de Casablanca </title>

<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="300,200" />
<link href="plugins/czm-chat-support.css" rel="stylesheet">

<style>
      .rq-main-footer .secondary-footer-logo{
        margin:0px!important;
        padding-bottom: 1rem;
        text-align: center;
        width:100%!important;
      }
      .rq-main-footer .secondary-footer-logo img{
        width:170px;
        
      }

      .rq-contact-us-map, .rq-registration-content-single{
        margin-bottom:25px;
      }
      
    </style>
<style>
    .inner-page-banner{
        height: 60vh;
    }
    .listing-single{
        border:1px solid #ccc;
    }
    .rq-listing-list .listing-single .listing-details,.listing-single .listing-details{
        border:0px;
    }

    .rq-listing-list .listing-single .listing-img{
        margin-top: 3rem;
        height: 200px;
    }
    .btn-booking{
        margin-top:1rem;
    }

    .text-danger{
      color:#f4d40c;
    }
    .text-center {
  text-align: center;
}


    
</style>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X94QXBEB37"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X94QXBEB37');
 
</script>
</head>
<body>
    <div id="example"></div>
<div id="main-wrapper">
<header class="header">
<nav class="navbar navbar-default" id="sticker">
<div class="container">

<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/"><img src="assets/img/logo-palaciocar.png" alt="" /></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="/">Accueil</a>
</li>
<li class="dropdown">
<a href="#">Nos Véhicules</a>
</li>
<li class="dropdown">
<a href="qui-sommes-nous.php">Qui sommes-nous ?</a>
</li>
<li class="dropdown">
<a href="contact.php">Contact</a>
</li>
<li class="login-register-link right-side-link"><a href="#">
<i class="icon_lock-open_alt"></i>Connexion</a>
</li>
<li class="dropdown right-side-link">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FR<span class="ion-chevron-down"></span></a>
<ul class="dropdown-menu with-language">
<li><a href="#">ES</a></li>
</ul>
 </li>
<li class="dropdown right-side-link">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAD<span class="ion-chevron-down"></span></a>
<ul class="dropdown-menu with-language">
<li><a href="#"> EUR </a></li>
</ul>
</li>
</ul>
</div>
</div>
</nav>

</header> 
<div class="inner-page-banner" style="background: url('assets/img/palaciocar-banner.jpg') center center no-repeat; background-size: cover;">
<div class="rq-overlay"></div>
<div class="container">
<div class="rq-title-container bredcrumb-title text-center">
<h2 class="rq-title">Nos Véhicules</h2>
<ol class="breadcrumb rq-subtitle secondary">
<li><a href="/">Accueil</a></li>
<li class="active">Nos Véhicules</li>
</ol>
</div>
</div>
</div> 
<div class="rq-page-content">
<div class="rq-content-block gray-bg small-padding-top">
<div class="container">

<div class="listing-search-container">
<form action="checkout.php" method="GET" id="reservation">
    
<input type="hidden" name="_token" value="">
<input type="hidden" name="car_id">
<div class="rq-search-container with-border">
<div class="rq-search-single">
<div class="rq-search-content">
<span class="rq-search-heading">Date départ</span>
<input autocomplete="off" type="text"  name="startdate" class="rq-form-element datepicker" id="startdate" value="<?php echo $startdate; ?>" placeholder="Du" required />
<i class="ion-chevron-down datepicker-arrow"></i>
</div>
</div>
<div class="rq-search-single">
<div class="rq-search-content">
<span class="rq-search-heading">Date retour</span>
<input autocomplete="off" type="text" name="enddate" class="rq-form-element" id="enddate" value="<?php echo $enddate;?>" placeholder="Au" required />
<i class="ion-chevron-down datepicker-arrow"></i>
</div>
</div>
<div class="rq-search-single">
<div class="rq-search-content last-child">
<span class="rq-search-heading">Votre âge</span>
<select name="age" class="year-option">
    <option value="23" <?php if(isset($_GET['age']) && $_GET['age'] == '23') echo 'selected'; ?>>23</option>
    <option value="24" <?php if(isset($_GET['age']) && $_GET['age'] == '24') echo 'selected'; ?>>24</option>
    <option value="25" <?php if(isset($_GET['age']) && $_GET['age'] == '25') echo 'selected'; ?>>25</option>
    <option value="26" <?php if(isset($_GET['age']) && $_GET['age'] == '26') echo 'selected'; ?>>26</option>
    <option value="27" <?php if(isset($_GET['age']) && $_GET['age'] == '27') echo 'selected'; ?>>27</option>
    <option value="28 ou plus" <?php if(isset($_GET['age']) && $_GET['age'] == '28') echo 'selected'; ?>>28 ou plus</option>
</select>
</div>
</div>
<div class="rq-search-single search-btn">
<div class="rq-search-content">
<a href="checkout.php?startdate=<?php echo $startdate ?>&enddate=<?php echo $enddate ?>"><button type="button" class="rq-btn rq-btn-primary fluid-btn" id="search">Chercher <i class="arrow_right"></i></button></a>
</div>
</div>
</div>
</form>
</div> 
<div class="rq-listing-top-bar-filter-option">
<div class="filter-list">

<span> </span>
<form method="POST"   style="display: flex; flex-direction: row; align-items: center;">
    <label for="marque" style="margin-left: 10px;">marque:</label>
    <select id="marque" name="marque"   style="margin-left: 20px;">
        <option value="tous">Tous</option>
        <option value="Renault">Renault</option>
        <option value="Citroën">Citroën</option>
        <option value="Hyundai">Hyundai</option>
        <option value="Peugeot">Peugeot</option>
        <option value="Kia">Kia</option>
        <option value="Range Rover">Range Rover</option>
        <option value="Dacia">Dacia</option>
      
    </select>
    <label for="gasoil" style="margin-left: 10px;">Gasoil:</label>
  <select name="gasoil" id="gasoil" style="margin-left: 20px;margin-right: 20px;">
    <option value="tous">Tous</option>
    <option value="Essence">Essence</option>
    <option value="Diesel">Diesel</option>
  </select>
  <input type="submit" value="Filter" style="background-color: #4CAF50; color: white; padding: 5px 25px; border: none; border-radius: 4px; cursor: pointer;">
</form>

</div>
<div class="rq-grid-list-view-option">
<a href="#" data-class="rq-listing-grid"><i class="ion-grid"></i></a>
<a class="active" href="#" data-class="rq-listing-list"><i class="ion-navicon"></i></a>
</div>
</div>
<div class="data"><div class="rq-car-listing-wrapper">
    <div class="rq-listing-choose rq-listing-list">
    <form id="reservation-form" action="checkout.php" method="GET">
    <?php 
 // Définir le nombre de voitures à afficher par page
 $cars_per_page = 4;

 // Récupérer le numéro de la page courante depuis l'URL
 if (isset($_GET['page'])) {
     $page = $_GET['page'];
 } else {
     $page = 1;
 }

 // Calculer l'offset (décalage) des voitures à afficher sur la page courante
 $offset = ($page - 1) * $cars_per_page;

 // Récupérer uniquement les voitures de la page courante en utilisant array_slice
 $page_cars = array_slice($cars, $offset, $cars_per_page);

?>
      <div class="row">
                        
      <?php foreach ($page_cars as $car):?>
 <?php   // Accéder aux données de chaque voiture
    $id = $car['id'];
    $name = $car['name'];
    $marque = $car['marque'];
    $image = $car['image'];
    $gasoil = $car['gasoil'];
    $boite_vitesse = $car['boite_vitesse'];
    $climatisation = $car['climatisation'];
    $places = $car['places'];
    $valises = $car['valises'];
    $portes = $car['portes'];
    $prix = $car['prix'];
    $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : date('y-m-d');
    $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : date('y-m-d', strtotime('+3 days'));
?>

        <div class="col-md-4 col-sm-6"> 
          <div class="listing-single"> 
            <div class="listing-img">
              <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
            </div>
            <div class="listing-details">
            <h3 class="car-name"><a href="checkout.php"><?php echo $name; ?></a></h3>
            <ul class="rating-list">
              <li><i class="ion-star"></i></li>
              <li><i class="ion-star"></i></li>
              <li><i class="ion-star"></i></li>
              <li><i class="ion-star"></i></li>
              <li><i class="ion-star"></i></li>
            </ul>
            <ul>
              <li>Gasoil: <span><?php echo $gasoil; ?></span></li>
              <li>Boite de vitesse: <span><?php echo $boite_vitesse;?></span></li>
              <li>Climatisation: <span><?php echo $climatisation; ?></span></li>
              <li>
                <i class="fa fa-users"></i> <span style="margin-right:1rem;"><?php echo $places; ?> Places</span>
                <i class="fa fa-suitcase"></i> <span style="margin-right:1rem;"><?php echo $valises; ?> Valises</span>
                <i class="fa fa-car"></i> <span style="margin-right:1rem;"><?php echo $portes; ?> Portes</span>
              </li>
            </ul>
            <div class="listing-footer text-center">
              <span class="text-center"> <span class="price"><?php echo $prix; ?> DH</span> par jour </span>
            </div>
            <input type="hidden" name="image" value="<?php echo $image; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="hidden" name="prix" value="<?php echo $prix; ?>">
          <input type="hidden" name="startdate" value="<?php echo $startdate; ?>">
          <input type="hidden" name="enddate" value="<?php echo $enddate; ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="selected_car_id" value="">


         
         <a href="checkout.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>&prix=<?php echo $prix; ?>&image=<?php echo $image; ?>&startdate=<?php echo $startdate; ?>&enddate=<?php echo $enddate; ?>" 
         style="display: inline-block; background-color: orange; color: white; padding: 10px 20px; text-align: center; text-decoration: none; font-size: 15px; border-radius: 5px; border: none; transition: background-color 0.3s ease;">Réserver</a>
        <script>
        function selectCar(carId) {
        document.querySelector('input[name="selected_car_id"]').value = carId;
        }
        </script>

          </div>
        </div>
        </div>
        <?php endforeach; ?>
      
      </form>
    </div>
    <!-- Afficher la pagination -->
<?php 
// Calculer le nombre total de pages
$total_pages = ceil(count($cars) / $cars_per_page);

// Afficher la pagination uniquement si le nombre de pages est supérieur à 1
if ($total_pages > 1): ?>
<div class="text-center">
<div class="pagination">
  <?php if ($page > 1): ?>
    <a href="?page=<?php echo ($page - 1); ?>&startdate=<?php echo $startdate; ?>&enddate=<?php echo $enddate; ?>&age=<?php echo $age; ?>" class="prev">&laquo; Précédent</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <?php if ($i == $page): ?>
      <span class="current"><?php echo $i; ?></span>
    <?php else: ?>
      <a href="?page=<?php echo $i; ?>&startdate=<?php echo $startdate; ?>&enddate=<?php echo $enddate; ?>&age=<?php echo $age; ?>"><?php echo $i; ?></a>
    <?php endif; ?>
  <?php endfor; ?>

  <?php if ($page < $total_pages): ?>
    <a href="?page=<?php echo ($page + 1); ?>&startdate=<?php echo $startdate; ?>&enddate=<?php echo $enddate; ?>" class="next">Suivant &raquo;</a>
  <?php endif; ?>
</div>

<?php endif; ?>
  </div></div></div>
</div> 
</div></div>

</div> 
<footer class="rq-footer">
<div class="rq-main-footer">
<div class="container">
<div class="secondary-footer-logo">
<img src="assets/img/logo-palaciocar.png" alt="">
</div>
<ul class="rq-footer-social">
    <li><a href="https://www.facebook.com/"target="_blank" ><i class="fa fa-facebook"></i> Facebook</a></li>
    <li><a href="https://instagram.com/" target="_blank" ><i class="fa fa-instagram"></i> Instagram</a></li>
    <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
</ul>
</div>
</div> 
<div class="rq-copyright-section">
<div class="container">
    <p class="secondary-copyright">© 2023 CAR RENTAL. All Rights Reseverd</p>
</div>
</div> 
</footer>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/moment.min.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script src="plugins/czm-chat-support.min.js"></script>
<script src="plugins/moment-timezone-with-data.min.js"></script>

</body>
</html>