<?php
// delete_department.php

    $id = $_REQUEST['id'];

    //echo $id;

//---------------------------------------------------------------------- 
// 1. CONNECT
//---------------------------------------------------------------------- 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//---------------------------------------------------------------------- 
// 2. SELECT (SQL)
//----------------------------------------------------------------------     
$sql = "DELETE FROM department";
$sql = $sql . " WHERE DEPT_ID = '$id'";

echo $sql;


//---------------------------------------------------------------------- 
// 3. EXECUTE
//----------------------------------------------------------------------     
$result = mysqli_query($conn, $sql);

// redirect
header("Location: department.php");
?>