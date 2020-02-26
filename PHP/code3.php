<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;

//SQL statemet
$sql = "SELECT DISTINCT c.CriticName FROM Critic c JOIN CriticReviews cr JOIN UserReviews ur JOIN ReviewSeeker rs ON c.CriticID=cr.CriticID AND cr.MovieID=ur.MovieID AND ur.UserID=rs.UserID WHERE rs.UserName = ? AND cr.Score >2 AND cr.Follow = 1";

//Prepared statement ,stage 1: prepare



global $message;


$username = $_SESSION['username'];

//Prepare statement, stage 2: bind and execute

$stmt = $mysqli->prepare($sql);
$stmt -> bind_param('s', $username);



if($stmt-> execute()){

//Bind result variables
$stmt->bind_result($Critic_CriticName);

	while ($stmt->fetch()){
		$message .= "<tr><td>$Critic_CriticName</td></tr><br>";
		
	}
}
	else{
		echo "error";
	}


// Close statement and connection
$stmt->close();
$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyCritics</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>
  <body id="page-top">

    <!-- Review Seeker -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">My critics</h2>
            <br><br>
            
            <br><br>
                <br><br>
            <h3 class="section-subheading text-muted"><?php echo $message; ?></h3>
            <br><br><br>
            <form action= "code4.php" method= "get">
                <input type="text" name= "criticname" value="Type critic name to unfollow">
                <br><br>
                <input type="submit" name="Unfollow" value="Unfollow">
            </form>
            
          </div>
      </div>
      </div>
    </section>
    </body>
    </html>