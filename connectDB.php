<?php
//----------------------------------------------------------------------
// connectDB.php
//---------------------------------------------------------------------- 
// 1. CONNECT
//---------------------------------------------------------------------- 
    $servername = "localhost"; // 127.0.0.1
    $username = "root";
    $password = "";
    $dbname = "company";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }    
?>