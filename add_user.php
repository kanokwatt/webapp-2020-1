<?php
// add_user.php

// 1. Initial
$user_name  = $_REQUEST["txt_USER_NAME"];
$dept_id    = $_REQUEST["txt_DEPT_ID"];

//echo $dept_id . ", ". $dept_name;

//---------------------------------------------------------------------- 
// 2. CONNECT
//---------------------------------------------------------------------- 
require "connectDB.php";

//---------------------------------------------------------------------- 
// 3. SELECT (SQL)
//---------------------------------------------------------------------- 
//$sql = "INSERT INTO department (DEPT_ID, DEPT_NAME)";
//$sql = $sql . " VALUES ('$dept_id', '$dept_name')";

$sql = "INSERT INTO user (USER_NAME, DEPT_ID)";
$sql = $sql . " VALUES ('$user_name', '$dept_id')";

echo $sql;

//---------------------------------------------------------------------- 
// 4. EXECUTE
//---------------------------------------------------------------------- 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// redirect
header("Location: user.php");

?>