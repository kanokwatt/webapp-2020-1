<?php
// user.php
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
    //$sql = "SELECT DEPT_ID, USER_NAME FROM department";
    //$sql = $sql . " WHERE DEPT_ID LIKE '%$find%' OR USER_NAME LIKE '%$find%'";

    $sql = "SELECT USER_ID, USER_NAME, DEPT_ID FROM user";
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
                    echo "<td><input type='text' name='txt_DEPT_ID' value='".$row['DEPT_ID']."' size='20'></td>";             
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
    
    mysqli_close($conn);   
?>                                       
    <hr/>
    <form action="add_user.php">
        <table>
            <tr>
                <td>USER_NAME:</td>
                <td><input type="text" name="txt_USER_NAME"></td>
            </tr>   
            <tr>
                <td>DEPT_ID:</td>
                <td><input type="text" name="txt_DEPT_ID"></td>
            </tr>                 
        </table>
        <button type="submit" class="btn">Add</button>            
    </form>
    </body>
</html>