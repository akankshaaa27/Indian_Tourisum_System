<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>ITS | Hotel List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="style.css" rel="stylesheet" type="text/css" media="all">
<script src="scripts.js"></script>
<script> new WOW().init(); </script>
<script>
    function bookHotel(hotelId) {
        // Implement your booking logic here
        // For demonstration, show a confirmation message
        alert('Booking successful');
    }
</script>
</head>
<body>
<?php include('includes/header.php'); ?>
<!--- banner ---->
<div class="banner-3">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">ITS - Hotel List</h1>
    </div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
    <div class="container">
        <div class="room-bottom">
            <h3>Hotel List</h3>
<?php 
$sql = "SELECT * FROM hotels"; // Modify to match your table name
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {	
?>
            <div class="rom-btm">
                <div class="col-md-3 room-left">
                <img src="images\h3.jpg" style="max-width: 100%;">
                </div>
                <div class="col-md-6 room-midle">
                <img src="images\h3.jpg" style="max-width: 100%;">
                    <h4>Hotel Name:Raj <?php echo htmlentities($result->name); ?></h4>
                    <p><b>description:Looking for good names for hotels? There is a saying, “As you name the boat, so shall it float”, implying that the success of your business can be influenced by its name.</b> <?php echo htmlentities($result->description); ?></p>
                </div>
                <div class="col-md-3 room-right">
                    <h5>Price:999 <?php echo htmlentities($result->price); ?></h5>
                    <button onclick="bookHotel(<?php echo $result->id; ?>)">Book Now</button>
                </div>
                <div class="clearfix"></div>
            </div>
<?php 
    } 
}
?>
        </div>
    </div>
</div>
<!--- /rooms ---->
<!--- footer-top ---->
<?php include('includes/footer.php'); ?>
<!-- signup -->
<?php include('includes/signup.php'); ?>			
<!-- signin -->
<?php include('includes/signin.php'); ?>			
<!-- write us -->
<?php include('includes/write-us.php'); ?>			
</body>
</html>
