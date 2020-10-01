<?php
// add_department.php

// 1. Initial
$dept_id    = $_REQUEST["txt_DEPT_ID"];
$dept_name  = $_REQUEST["txt_DEPT_NAME"];

//echo $dept_id . ", ". $dept_name;

//---------------------------------------------------------------------- 
// 2. CONNECT
//---------------------------------------------------------------------- 
require "connectDB.php";

//---------------------------------------------------------------------- 
// 3. SELECT (SQL)
//---------------------------------------------------------------------- 
$sql = "INSERT INTO department (DEPT_ID, DEPT_NAME)";
$sql = $sql . " VALUES ('$dept_id', '$dept_name')";

//echo $sql;

//---------------------------------------------------------------------- 
// 4. EXECUTE
//---------------------------------------------------------------------- 
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// redirect
header("Location: department.php");

?>