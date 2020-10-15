<?php
// add_user.php

// 1. Initial
$user_name  = $_REQUEST["txt_USER_NAME"];
$pwd        = $_REQUEST["txt_PASSWORD"];    
$dept_id    = $_REQUEST["txt_DEPT_ID"];

echo "Password Before MD5: " . $pwd;
echo "Password After MD5: " . md5($pwd);

$pwd = md5($pwd);

//---------------------------------------------------------------------- 
// 2. CONNECT
//---------------------------------------------------------------------- 
require "connectDB.php";

//---------------------------------------------------------------------- 
// 3. SELECT (SQL)
//---------------------------------------------------------------------- 
//$sql = "INSERT INTO department (DEPT_ID, DEPT_NAME)";
//$sql = $sql . " VALUES ('$dept_id', '$dept_name')";

$sql = "INSERT INTO user (USER_NAME, PASSWORD, DEPT_ID)";
$sql = $sql . " VALUES ('$user_name', '$pwd', '$dept_id')";

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
header("Location: user.php");

?>