<?php
include 'config/database.php';

$appointmentID=isset($_GET['appointmentID']) ? $_GET['appointmentID'] : die('ERROR:  Appointment Not Found');

$query="DELETE from appointments where appointmentID=?";

$getIDSTMT=$con->prepare($query);
$getIDSTMT->bindParam(1, $appointmentID);
$getIDSTMT->execute();

header('location:index.php');
?>