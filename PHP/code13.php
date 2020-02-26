<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$mysqli = mysqli_connect ('localhost', 'cmacrae', 'Winter@*%2018', 'cmacrae') ;
//New REVIEW by critic
$sql = "INSERT INTO CriticReviews(CriticID, MovieID, Score) VALUES ((SELECT CriticID FROM Critic WHERE CriticName = ?),(SELECT MovieID FROM Movies WHERE MovieName = ?), ?)";

//Prepared statement, stage 1: prepare

$moviename = $_GET['mc-movie'];
$score = $_GET ['mc-score'];
$username2 = $_SESSION['username2'];


//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);


$stmt->bind_param('sss', $username2, $moviename, $score);


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