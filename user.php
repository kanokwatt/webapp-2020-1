<?php
// user.php

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
    $sql = "SELECT USER_ID, USER_NAME, PASSWORD, DEPT_ID FROM user";
    $sql = $sql . " WHERE USER_ID LIKE '%$find%' OR USER_NAME LIKE '%$find%' OR DEPT_ID LIKE '%$find%'";

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

                // UPDATE
                echo "<form action='update_user.php'>";
                    echo "<td>" . $row['USER_ID']."</td>";
                    echo "<td><input type='text' name='txt_USER_NAME' value='".$row['USER_NAME']."' size='20'></td>";   
                    
                    // 2. SELECT (SQL)
                    $sql = "SELECT DEPT_ID, DEPT_NAME FROM department";

                    // 3. EXECUTE 
                    $result1 = mysqli_query($conn, $sql);

                    echo "<td><select name='txt_DEPT_ID'>";
                    if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_assoc($result1)) {

                            $selected = '';

                            if($row['DEPT_ID'] == $row1['DEPT_ID']) $selected = 'selected';
                            echo "<option value='". $row1['DEPT_ID']. "' $selected>". $row1['DEPT_NAME']. "</option>";
                            
                        }
                    }
                    echo "</select></td>";     

                    echo "<td><input type='text' name='txt_PASSWORD' value='".$row['PASSWORD']."' size='40'></td>";  
                                        
                    echo "<td><button>Update</button></td>"; 
                    echo "<input type='hidden' name='id' value='" . $row['USER_ID'] ."'>";
                echo "</form>";
                
                // DELETE    
                echo "<form action='delete_user.php'>";
                    echo "<td><button>Delete</button></td>"; 
                    echo "<input type='hidden' name='id' value='" . $row['USER_ID'] ."'>";
                echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "0 results";
    }
    
    //mysqli_close($conn);   

?>                                       
    <hr/>
    <form action="add_user.php">
        <table>
            <tr>
                <td>USER NAME:</td>
                <td><input type="text" name="txt_USER_NAME"></td>
            </tr>   
            <tr>
                <td>PASSWORD:</td>
                <td><input type="text" name="txt_PASSWORD"></td>
            </tr>             
            <tr>
                <td>DEPARTMENT NAME:</td>
                <td>
<?php    

//---------------------------------------------------------------------- 
// 2. SELECT (SQL)
//---------------------------------------------------------------------- 
$sql = "SELECT DEPT_ID, DEPT_NAME FROM department";            

//---------------------------------------------------------------------- 
// 3. EXECUTE
//----------------------------------------------------------------------     
    $result = mysqli_query($conn, $sql);

    echo "<select name='txt_DEPT_ID'>";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='". $row['DEPT_ID']. "'>". $row['DEPT_NAME']. "</option>";
        }
    }
    echo "</select>";
?>
                </td>
            </tr>                 
        </table>
        <button type="submit" class="btn">Add</button>            
    </form>
    </body>
</html>