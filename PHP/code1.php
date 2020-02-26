<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;


// Review Seeker code 1
// Funtcion given username enter that users profile
//SQL statement 

$sql = "SELECT Name FROM ReviewSeeker WHERE UserName = ?";




//Prepared statement, stage 1: prepare

$username = $_GET['rs-username'];
$_SESSION['username']=$username;



//Prepared statement, stage 2: bind and execute
$stmt = $mysqli-> prepare ($sql);

$stmt->bind_param('s', $username);





   if ( $stmt -> execute()){
       //if ($stmt -> is_null){
        //echo "Username not found"; 
           
       //}
     //else {
     $stmt->bind_result($ReviewSeeker_Name);
     while ($stmt -> fetch()){
           $rsname = "$ReviewSeeker_Name";
       }
   
     //} 
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

    <title>EchoChamber-<?php echo $rsname;?></title>

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
            <h2 class="section-heading text-uppercase"><?php echo $rsname; ?></h2>
            <h3 class="section-subheading text-muted">What would you like to view?</h3>
            <!--buttons-->
            <form action= "code3.php" method= "get">
          <button type="submit" value="criticlist">My critics </button>
          </form>
         <br><br><br>
         <form action= "code5.php" method= "get">
          <button type="submit" value="criticmovielist">Movies reviewed by my critics</button>
          
          </form>
          <br><br><br>
          <form action= "code10.php" method= "get">
          <button type="submit" value="moviesreviewed">Place a review</button>
          
          </form>
          </div>
      </div>
      </div>
    </section>
    </body>
    </html>