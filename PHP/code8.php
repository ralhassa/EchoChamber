<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

// mysqli connection via user-defined function
include('./myconnect-ec.php');
$mysqli = get_mysqli_conn();

//Update
// a critic reviews a new movie
//SQL statement 
$sql = "";

//Prepared statement, stage 1: prepare

$moviename = $_GET['moviename'];
$score = $_GET ['moviescore'];

//Prepared statement, stage 2: bind and execute
$stmt = $mysqli->prepare($sql);


$stmt->bind_param('ss', $moviename, $score);


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