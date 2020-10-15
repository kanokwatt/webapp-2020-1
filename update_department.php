<?php
// update_department.php

// 1. Initial
//$dept_id    = $_REQUEST["txt_DEPT_ID"];         // COM
$dept_name  = $_REQUEST["txt_DEPT_NAME"];       // ACCOUNT
$id         = $_REQUEST["id"];                  // ACC

// 2. CONNECT
require "connectDB.php";

// 3. SELECT (SQL)
$sql = "UPDATE department SET DEPT_NAME='$dept_name' WHERE DEPT_ID = '$id'";

// 4. EXECUTE
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// 5. Redirect
header("Location: department.php");
?>