<?php
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];
 $image = $_GET['image'];
 $prix = $_GET['prix'];
 $name = $_GET['name'];
 $phone = $_GET['phone'];
 $email = $_GET['email'];
 $nameC = $_GET['nameC'];
 ?>
 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/Oauth.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/POP3.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'essaihdouha47@gmail.com';
$mail->Password = 'cwraamljfagyafwd';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('douhaessaih47@gmail.com', 'douha');
$mail->addAddress($email, $nameC);
$mail->addReplyTo('douhaessaih47@gmail.com', 'douha');

$mail->isHTML(true);

$mail->Subject = 'Validation de votre location';
$mail->Body = '<h3>Bonjour, <br />Bien reçu votre demande de réservation.</h3><br />Voiture:' . $_GET['name'] . ',<br/> Période de location: DU ' . $_GET['startdate'] . ' AU ' . $_GET['enddate'] . ';<br /> <br />Durée:' . $_GET['interval'] . ' Jours. <br/>Prix:   ' . $_GET['prix'] . ' Dirhams  par jour.<br /> <br />Caution franchise assurance tout risque  ' . $_GET['total'] . ' Dirhams  à laisser en garantie  par carte de crédit  / espèces.<br /><br />Dans ce prix sont inclus :<br />- Kilométrage illimité<br />- Livraison et retour de la voiture à l\'aéroport / port / hôtel / gare TGV .<br/><br/> Cordialement.';
$mail->AltBody = 'Bonjour, Bien reçu votre demande de réservation. Veuillez trouver ci-dessous les informations sur votre location :' . "\r\n" . 'Nom : ' . $_GET['name'] . "\r\n" . 'Période de location : du ' . $_GET['startdate'] . ' au ' . $_GET['enddate'] . "\r\n" . 'Durée : ' . $_GET['interval'] . ' jours' . "\r\n" . 'Prix : ' . $_GET['prix'] . ' Dirhams par jour' . "\r\n" . 'Caution franchise assurance tout risque : ' . $_GET['total'] . ' Dirhams à laisser en garantie par carte de crédit / espèces' . "\r\n" . 'Dans ce prix sont inclus :' . "\r\n" . '- Kilométrage illimité' . "\r\n" . '- Livraison et retour de la voiture à l\'aéroport / port / hôtel / gare TGV.';


if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail: ' . $mail->ErrorInfo;
} else {
    echo 'E-mail envoyé avec succès';
}
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
<div ><img width="" src="images/logo1.jpeg" alt=""/></div>
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
  .mt-4{
    margin-top:2rem;
  }

  .rq-form-control{
    margin-top: 19px;
    margin-bottom: 0px;
  }
  div img {
  width: 150px; /* définir la largeur de l'image en pixels */
  height: auto; /* définir la hauteur de l'image sur "auto" pour que la proportion soit correcte */
  padding-left : 30px;
  padding-top : 30px;
}

</style>
</head>
<body> 
<div class="rq-cart-items">
<form action="" method="">
<div class="row">
<div class="col-md-12">
<div class="cart-items-table">
<div class="table-responsive">
<table>
<thead>
<tr class="table-head">
<th>Nom de voiture</th>
<th>Statut</th>
<th>Prix</th>
<th>Quantité</th>
<th>TOTAL</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<a href=""><img src="<?php echo $image; ?>" alt="item"></a>
<div class="details">
<h5><?php echo $name; ?></h5>
<ul class="items">
<li>Date départ:<span><?php echo $startdate;?></span>
</li>
<li>Date retour:<span><?php echo $enddate;?></span>
</li>  
</ul>
<?php
// Récupération des dates de départ et d'arrivée du formulaire
$datedebut = new DateTime($startdate);
$datefin = new DateTime($enddate);
$interval = $datedebut->diff($datefin);
$nbrejours = $interval->days + 1;
?>
</div>
</td>
<td>En attente</td>
<td><?php echo $prix; ?> DH </td>
<td><?php  echo $nbrejours; ?> Jour(s)</td>
<td>
<?php 
$total = $nbrejours *(float)$prix; 
echo $total;
?> DH 
</td>
</tr>
</tbody>
</table>
<ul>
<li><strong>Nom:</strong> <span><?php echo $nameC; ?></span></li>
<li><strong>Téléphone:</strong><span><?php echo $phone; ?></span></li>
<li><strong>E-mail:</strong> <span><?php echo $email;?></span></li>
<ul>
</div>
</div>
</div>
</form>