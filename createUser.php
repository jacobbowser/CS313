<!DOCTYPE html>
<html>
    <head>
        <title>Create User Page</title>
    </head>
    <body>
        <?php
        $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST'); 

if ($openShiftVar === null || $openShiftVar == "")
{
     // Not in the openshift environment
     $dbHost = "localhost";
     // …
}
else 
{
     // In the openshift environment 
     $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
     // …
}
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO("mysql:host=$dbHost;dbname=basketball", 'jacobbowser', 'password', $pdo_options);

$leagueRequest = $db->query("SELECT * FROM league");
$playerRequest = $db->query('SELECT * FROM player');
        
        ?>
        <h2>Fill out your information:</h2>
        <form action="insertUser.php" method="POST">
            <b>Username: </b><input type='text' name='usr'><br />
            <b>Password: </b><input type='password' name ='pwd'><br /><br />
            <b>Choose League:</b><select name="leagueId">
            <?php
            foreach($leagueRequest as $league) { 
                $leagueName = $league['name']; ?>                
                <option name="leagueId" value="<?php echo $league['id'];?>"><?php echo $leagueName;?></option>
               <?php
                }
            ?>
            </select><br /><br />
            <b>Team Name: </b><input type='text' name='teamName'><br /><br />
            <b>Choose 5 players for your team:</b><br />
            <?php
            foreach ($playerRequest as $player) { 
                $playerName = $player['name']; ?>
                <input type="checkbox" name="players[]" id="players" value="<?php echo $player['id'];?>">
                <?php echo $playerName; ?><br />
                <?php
            }
            ?>
            <br /><input type="submit">
        </form>
    </body>
</html>


