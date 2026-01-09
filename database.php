<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_database = "authentication";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if($conn){
    echo "DB connected!";
}


?>