<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;


//Update
// updates your critic list
//SQL statement 
$sql = "UPDATE CriticReviews, Critic SET Follow = 0 WHERE Critic.CriticID = CriticReviews.CriticID AND Critic.CriticName = ?";


//Prepared statement, stage 1: prepare

$critic = $_GET['criticname'];



//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);

$stmt -> bind_param('s', $critic);


if ( $stmt -> execute()){
       function goback()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
 
goback();
   }
   else{
       echo "there is an error";
   }
//Bind result variables
/*fetch values*/

/*close statement and connection*/
$stmt->close();
$mysqli->close();
?>


