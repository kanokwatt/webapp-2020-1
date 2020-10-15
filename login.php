<html>
    <head>
        <title>Please Login</title>
    </head>
    <body>
    <?php
        if(isset($_REQUEST['err']))
            echo "Incorrect Username or Password!";
    ?>
        <form action="checkLogin.php">
            Username: <input type="text" name="txt_USER_NAME"><br/>
            Password: <input type="text" name="txt_PASSWORD"><br/>
            <input type="submit" value="Login">
            <input type="reset" value="Clear">
        </form>
    </body>
</html>