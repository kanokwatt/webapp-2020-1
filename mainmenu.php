<?php
// mainmenu.php
// Check Authentication
session_start();

if(!isset($_SESSION['user']))  // Unauthorized
  // redirect to login.php
  header("Location: login.php"); 
?>
<html>
    <head><title>Main Menu</title></head>
    <body>
        <?php
            echo "Hello, " . $_SESSION['user'];
        ?>
        <a href="department.php">DEPARTMENT</a><br/>
        <a href="user.php">USER</a><br/>
        <a href="logout.php">Logout</a>
    </body>
</html>