<?php
// update_user.php

// 1. Initial       
        
$user_name  = $_REQUEST["txt_USER_NAME"];       
$id         = $_REQUEST["id"];                  
$dept_id    = $_REQUEST["txt_DEPT_ID"];                  

// 2. CONNECT
require "connectDB.php";

// 3. SELECT (SQL)
$sql = "UPDATE user SET USER_NAME='$user_name', DEPT_ID='$dept_id' WHERE USER_ID = '$id'";

//echo $sql;

// 4. EXECUTE
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// 5. Redirect
header("Location: user.php");
?>