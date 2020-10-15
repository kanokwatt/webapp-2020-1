<?php
session_start();
// checkLogin.php

// 0. Initial
  $user     = $_REQUEST['txt_USER_NAME'];
  $pwd      = $_REQUEST['txt_PASSWORD'];

  //echo $user . ", " . $pwd;
  $pwd = md5($pwd);

//---------------------------------------------------------------------- 
// 1. CONNECT
//---------------------------------------------------------------------- 
  require "connectDB.php";

//---------------------------------------------------------------------- 
// 2. SELECT (SQL)
//---------------------------------------------------------------------- 
  $sql = "SELECT USER_ID, USER_NAME, PASSWORD, DEPT_ID FROM user ";
  $sql .= "WHERE USER_NAME ='$user' AND PASSWORD = '$pwd'";

  echo $sql;

//---------------------------------------------------------------------- 
// 3. EXECUTE
//----------------------------------------------------------------------     
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {   // Found username and password

    $_SESSION['user'] = $user;
    // 4. Redirect to mainmenu.php
    header("Location: mainmenu.php"); 
  }
  else {  // Failed
    // 4. Redirect to login.php
    header("Location: login.php?err=1");       
  }
 
?>