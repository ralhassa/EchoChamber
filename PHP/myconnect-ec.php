

	<?php
// Function to obtain mysqli connection.
function get_mysqli_conn()
{
$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'cmacrae';
$dbpassword = 'Winter@*%2018';
$dbname = 'cmacrae';
$mysqli = mysqli_connect ($dbhost, $dbuser, $dbpassword, $dbname);
if ($mysqli->connect_errno) 
{
echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
return $mysqli;
}

/* phpinfo(); */
?>