<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['hotel_details'])) {
    $hotelId = $_POST['hotelId']; // Assuming hotelId is sent via form or JavaScript
    $userId = $_SESSION['userid']; // Assuming you have a logged-in user

    // Insert booking into the database
    $sql = "INSERT INTO bookings (hotel_id, user_id) VALUES (:hotelId, :userId)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
    $query->bindParam(':userId', $userId, PDO::PARAM_INT);
    $query->execute();

    // You can also add additional booking details as needed
    // Example: $checkInDate = $_POST['checkInDate'];
}
?>