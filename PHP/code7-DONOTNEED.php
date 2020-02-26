<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

// DO WE NEED CRITIC INFO
// list of all the movies that a critic has reviewed
//mysqli connection via user-defined function
include('./myconnect-ec.php');
$mysqli = get_mysqli_conn();

//SQL statemet
$sql = "list of movies that the crtic has reviewed and the score they gave it";

//Prepare statement: bind and execute

$stmt = $mysqli->prepare($sql);



if($stmt-> execute()){

//Bind result variables
$stmt->bind_result($moviname, $moviescore);// the movies that the critic has reviewed

	while ($stmt->fetch()){
		$message .= "<tr><td>$moviename</td><td>$moviescore</td></tr>";
		
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

    <title>EchoChamber</title>

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

    <!-- Movie Critic -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase"><?php echo $mcname;?></h2>
            <h3 class="section-subheading text-muted">This is a list of the movies that you have reviewed </h3>
            <!--get critic name-->
            <form action= "code2.php" method= "get">
                Username<br>
                <input type="text" name="mc-username">
                <br>
                <br><br>
                <input type="submit" name="submit">
                
            </form>
          </div>
        </div>
      </div>
    </section>
    </body>
    </html>
    