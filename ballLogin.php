<!DOCTYPE html>
<html>
    <head>
        <title>Fantasy Basketball Login</title>
    </head>
    <body style="background-color:goldenrod">
        <h1 style="font-family: monospace; text-align: center">FANTASY BASKETBALL<br />LOGIN</h1>
        <form id="login" action="basketball.php" method="POST">
            
            <table cellpadding='3' border='1' style='margin:auto; text-align: center'>
                <tr><td>Username: <input type="text" name="usr" required/></td></tr>  
                <tr><td>Password: <input type="password" name="pwd" required /></td></tr>
                <tr><td><input type="submit"></td></tr>
            </table>
        </form>
        <br />
        <p style="text-align:center">
            <a href="createUser.php">Create User</a>
        </p> 
    </body>
</html>
