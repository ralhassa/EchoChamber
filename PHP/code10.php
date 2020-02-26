<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;

$sql ="SELECT m.MovieName, ur.Score FROM Movies m JOIN UserReviews ur JOIN ReviewSeeker rs WHERE m.MovieID = ur.MovieID AND ur.UserID = rs.UserID AND rs.UserName = ?";

$username= $_SESSION['username'];

global $listofmovies;

//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);

$stmt->bind_param('s', $username);



       if ($stmt -> execute()){
           $stmt->bind_result($Movies_MovieName,$UserReviews_Score);
           while ($stmt -> fetch()){
           $listofmovies .= "<tr><td>$Movies_MovieName</td>-<td>$UserReviews_Score</td></tr><br>";
          
           }
       }
       else{
       echo "there is an error";
   }


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

    <title>Review</title>

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
            
            <br><br><h3 class="section-subheading text-muted">What movie would you like to review?</h3>
             <!--get Movie review-->
            <form action= "code12.php" method= "get">
                Type
                <input type="text" name="rs-movie" value= "Title here">
                <input type="text" name="rs-score" value= "Score here (between 1 and 5)">
                <br><br>
                <input type="submit" name="newreview" value ="New review">
                
            </form><br><br>
                <h3 class="section-subheading text-muted">This is a list of the movies you have reviewed</h3>
            <h3 class="section-subheading text-muted"><?php echo $listofmovies;?></h3>
            <br>
            <br>
            
          </div>
      </div>
      </div>
    </section>
    </body>
    </html>