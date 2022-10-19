<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Settings page
    // Last Updated: 24-May-2021
?>

<?php 
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s103172407"; // your user name
	$pwd = "hon3ysuckl3"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s103172407_db"; // your database
  
    function sanitise_input($data) { // function to sanitise input
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "", $data);
        $data = str_replace('"', "", $data);
        return $data;
    }

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // HUPD - this returns FALSE on failure
?>