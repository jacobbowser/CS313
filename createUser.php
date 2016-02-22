<!DOCTYPE html>
<html>
    <head>
        <title>Create User Page</title>
    </head>
    <body style="background-color: lightblue">
<?php
$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST'); 

if ($openShiftVar === null || $openShiftVar == "")
{
     // Not in the openshift environment
    $dbHost = "localhost"; 
    $dbUser = "jacobbowser"; 
    $dbPassword = "password";
     // …
}
else 
{
     // In the openshift environment 
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

}

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO("mysql:host=$dbHost;dbname=basketball", $dbUser, $dbPassword, $pdo_options);

$leagueRequest = $db->query("SELECT * FROM league");
$playerRequest = $db->query('SELECT * FROM player');
        
        ?>
        
        <form style="text-align:center" action="insertUser.php" method="POST">
            <h2>Fill out your information:</h2>
            <b>Username: </b><input type='text' name='usr' placeholder="Username" required><br />
            <b>Password: </b><input type='password' name ='pwd' placeholder="Password" required><br /><br />
            <b>Choose League:</b><select name="leagueId">
            <?php
            foreach($leagueRequest as $league) { 
                $leagueName = $league['name']; ?>                
                <option name="leagueId" value="<?php echo $league['id'];?>"><?php echo $leagueName;?></option>
               <?php
                }
            ?>
            </select><br /><br />
            <b>Team Name: </b><input type='text' name='teamName' placeholder="Team Name" required><br /><br />
            <b>Choose 5 players for your team:</b><br />
            <?php
            for($i=1; $i<6; $i++) { 
                echo "<input type='text' name='players$i' placeholder='Player $i' required><br />";
            }
            ?>
            <br /><input type="submit">
        </form>
    </body>
</html>


