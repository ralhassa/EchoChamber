<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;



// Movie critic code 2
// Funtcion given username enter that users profile
//SQL statement 
$sql ="SELECT Name FROM Critic WHERE CriticName = ?";
$sql2= "SELECT m.MovieName, cr.Score FROM Movies m JOIN CriticReviews cr JOIN Critic c WHERE m.MovieID = cr.MovieID AND cr.CriticID = c.CriticID AND c.CriticName = ?";

global $listofmovies;

//Prepared statement, stage 1: prepare

$username2 = $_GET['mc-username'];

$_SESSION['username2']= $username2;
//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);
$stmt2= $mysqli -> prepare($sql2);

$stmt->bind_param('s', $username2);
$stmt2 -> bind_param('s',$username2);



 if($stmt -> execute()){
     
     $stmt->bind_result($Critic_Name);
     
     while ($stmt -> fetch()){
           $mcname = "$Critic_Name";
       }
       }else{
       echo "there is an error";
   }

       if ($stmt2 -> execute()){
           $stmt2->bind_result($Movie_MovieName, $CriticReviews_Score);
           while ($stmt2 -> fetch()){
            $listofmovies .= "<tr><td>$Movie_MovieName</td>-<td>$CriticReviews_Score</td></tr><br>";
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

    <title>EchoChamber-<?php echo $mcname;?></title>

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
            <br><br><br>
            
             <h3 class="section-subheading text-muted">Would you like to Review a movie?</h3>
             <!--get Movie review-->
            <form action= "code13.php" method= "get">
                Type
                <input type="text" name="mc-movie" value= "Title here">
                <input type="text" name="mc-score" value= "Score here (between 1and5)">
                <br><br>
                <input type="submit" name="newreview" value ="New review">
                
            </form><br><br><br>
             
            <h3 class="section-subheading text-muted">This is a list of the movies you have reviewed</h3>
            <br><br>
            <h3 class="section-subheading text-muted"><?php echo $listofmovies;?></h3>
            
            
          </div>
        </div>
      </div>
    </section>
    </body>
    </html>