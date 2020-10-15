<?php
// department.php

// Check Authentication
session_start();

if(!isset($_SESSION['user']))  // Unauthorized
  // redirect to login.php
  header("Location: login.php"); 

    // Initial
    $find = "";

    if (isset($_REQUEST['txtSearch'])) $find = $_REQUEST['txtSearch'];

    //echo $find;

//---------------------------------------------------------------------- 
// 1. CONNECT
//---------------------------------------------------------------------- 
    require "connectDB.php";

//---------------------------------------------------------------------- 
// 2. SELECT (SQL)
//----------------------------------------------------------------------     
    $sql = "SELECT DEPT_ID, DEPT_NAME FROM department";
    $sql = $sql . " WHERE DEPT_ID LIKE '%$find%' OR DEPT_NAME LIKE '%$find%'";

    //echo $sql;
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

                echo "<form action='update_department.php'>";
                    //echo "<td><input type='text' name='txt_DEPT_ID' value='".$row['DEPT_ID']."' size='3' readonly></td>";
                    echo "<td>" . $row['DEPT_ID']."</td>";
                    echo "<td><input type='text' name='txt_DEPT_NAME' value='".$row['DEPT_NAME']."' size='20'></td>";               
                    echo "<td><button>Update</button></td>"; 
                    echo "<input type='hidden' name='id' value='" . $row['DEPT_ID'] ."'>";
                echo "</form>";
                
                
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
    <hr/>
    <form action="add_department.php">
        <table>
            <tr>
                <td>DEPARTMENT ID:</td>
                <td><input type="text" name="txt_DEPT_ID" size="5"></td>
            </tr>
            <tr>
                <td>DEPARTMENT NAME:</td>
                <td><input type="text" name="txt_DEPT_NAME"></td>
            </tr>        
        </table>
        <button type="submit" class="btn">Add</button>            
    </form>
    </body>
</html>