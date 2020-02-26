<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;
//New REVIEW
$sql = "INSERT INTO UserReviews (MovieID, Score, UserID) VALUES ((SELECT MovieID FROM Movies WHERE MovieName = ?), ?, (SELECT UserID FROM ReviewSeeker WHERE UserName = ?))
";

//Prepared statement, stage 1: prepare

$moviename = $_GET['rs-movie'];
$score = $_GET ['rs-score'];
$username= $_SESSION['username'];


//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);


$stmt->bind_param('sss', $moviename, $score, $username);


if ($stmt->execute()){
function goback()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
 
goback();
} else {
	echo "error";
}


//Bind result variables
/*fetch values*/

/*close statement and connection*/
$stmt->close();
$mysqli->close();
?>