<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loc_voiture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Collect form data
    $date_debut = date('Y-m-d', strtotime($_GET["startdate"]));
    $date_fin = date('Y-m-d', strtotime($_GET["enddate"]));
   // $lieu_prise = $_GET["lieu_prise"];
  //  $lieu_retour = $_GET["lieu_retour"];
    $totalttc = $_GET["total"];
   // $client_id = $_GET["client_id"];
    $voiture_id = $_GET["id"];

    // Generate a unique reservation number
    $num_reservation = uniqid();

    // Set initial reservation status
    $etat_reservation = "Pending";

    // Insert form data into the database
    $sql = "INSERT INTO reservations (num_reservation, date_debut, date_fin, etat_reservation,totalttc, voiture_id)
            VALUES ('$num_reservation', '$date_debut', '$date_fin', '$etat_reservation', '$totalttc',  '$voiture_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
