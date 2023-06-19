<?php
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "#",
                'Name' => "Hamza Boutouil"
            ],
            'To' => [
                [
                    'Email' => $_GET['email'],
                    'Name' => "#"
                ]
            ],
            'Subject' => "Valide Réservation.",
            'HTMLPart' => "<h3>Bonjour, <br />Bien reçu votre demande de réservation</h3><br />" . $_GET['name'] . ", DU " . $_GET['startdate'] . " AU " . $_GET['enddate'] . ";<br /> <br />" . $_GET['interval'] . " Jours   " . $_GET['prix'] . " Dirhams  par jour.<br /> <br />Caution franchise assurance tout risque  " . $_GET['total'] . " Dirhams  a laisser en garantie  par carte de crédit  /espèces<br /><br />Dans ce prix  sont inclus<br />Kilométrage illimite<br />Livraison  et retour de la voiture aéroport  / port / hôtel / gare TGV "

        ]
    ]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json'
));
curl_setopt($ch, CURLOPT_USERPWD, "02c6a8af3693053d36060fa2b3f93c6a:333d68e87124cec709631de348ffb588");
$server_output = curl_exec($ch);
curl_close ($ch);

$response = json_decode($server_output);
if (isset($response) && property_exists($response, 'Messages') && $response->Messages[0]->Status == 'success') {
    echo "Votre réservation est validé.";
}
