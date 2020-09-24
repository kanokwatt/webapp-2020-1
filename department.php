<?php
// department.php
    // Initial
    $find = "";

    if (isset($_REQUEST['txtSearch'])) $find = $_REQUEST['txtSearch'];

    //echo $find;

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
    $sql = "SELECT DEPT_ID, DEPT_NAME FROM department";
    $sql = $sql . " WHERE DEPT_ID LIKE '%$find%' OR DEPT_NAME LIKE '%$find%'";

    echo $sql;


?>
<html>
    <head><title>Department</title></head>
    <body>

<?php                
//---------------------------------------------------------------------- 
// 3. EXECUTE
//----------------------------------------------------------------------     
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<form>";
        echo "<table border='1'>";      
            echo "<input type='text' name='txtSearch'>";
            echo "<input type='submit' value='Search'>";
        echo "</form>";            
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
                echo "<td>".$row['DEPT_ID']."</td>";
                echo "<td>".$row['DEPT_NAME']."</td>";
                echo "<form action='delete_department.php'>";
                echo "<td><button>Delete</button></td>"; 
                echo "<input type='hidden' name='id' value='" . $row['DEPT_ID'] ."'>";
                echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);   
?>                                       
      
    </body>
</html>