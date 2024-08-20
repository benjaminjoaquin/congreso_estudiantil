<?php 
    $servername= "localhost";
    $database= "congreso";
    $username= "root";
    $pass= "";            
    $conn = mysqli_connect($servername,$username,$pass,$database);
    if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }
?>


