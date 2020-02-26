<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;
//UPDAT REVIEW
$sql = "UPDATE UserReviews, Movies, ReviewSeeker SET UserReviews.Score = ? WHERE UserReviews.MovieID = Movies.MovieID AND UserReviews.UserID = ReviewSeeker.UserID AND ReviewSeeker.UserName = ? AND Movies.MovieName = ?";

//Prepared statement, stage 1: prepare

$moviename = $_GET['moviename'];
$score = $_GET ['moviescore'];
$username= $_SESSION['username'];


//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);


$stmt->bind_param('sss', $score, $username,$moviename);


if ($stmt->execute()){




} else {
	echo "error";
}


//Bind result variables
/*fetch values*/

/*close statement and connection*/
$stmt->close();
$mysqli->close();
?>