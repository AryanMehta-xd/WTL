<?php 

    $server = "localhost";
    $user = "root";
    $pass = "1234";
    $db_name = "resume_finder";

    $con = mysqli_connect($server,$user,$pass,$db_name);

    if(!$con){
        die("Error!!");
    }
?>