<?php
// department.php

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
// 2. SELECT
//----------------------------------------------------------------------     
    $sql = "SELECT DEPT_ID, DEPT_NAME FROM department";


?>
<html>
    <head><title>Department</title></head>
    <body>

        <select>
            <option value="acc">accounting</option>
            <option value="com">computer</option>
        </select>

<?php                
//---------------------------------------------------------------------- 
// 3. EXECUTE
//----------------------------------------------------------------------     
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<select>";        
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row["DEPT_ID"]."'>". $row["DEPT_NAME"] ."</option>";
           // echo '<option value="'.$row['DEPT_ID'].'">'. $row['DEPT_NAME'] .'</option>';
        }
        echo "</select>";
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);   
?>                                       
      
    </body>
</html>