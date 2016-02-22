<!DOCTYPE html>
<html>
    <head>
        <title>Fantasy Basketball Scores</title>
    </head>
    <body style="background-color: cyan" >
        <?php
$leagueIdent = $_POST["userId"];
$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST'); 

if ($openShiftVar === null || $openShiftVar == "")
{
     // Not in the openshift environment
    $dbHost = "localhost";
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
    $dbUser = 'jacobbowser'; 
    $dbPassword = 'password';
     // …
}
else 
{
     // In the openshift environment 
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     // …
}

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO("mysql:host=$dbHost;dbname=basketball", $dbUser, $dbPassword, $pdo_options);
?>
        <div style="text-align:center">
    <?php
$userRequest = $db->query("SELECT * FROM user");
$leagueRequest = $db->query("SELECT * FROM league");
$userNameRequest = $db->query("SELECT * FROM user WHERE username = \"$leagueIdent\"");
foreach ($userNameRequest as $thisUser) {
    foreach ($leagueRequest as $league) {
        if ($thisUser['leagueId'] == $league['id']) {
            echo "<h1>LEAGUE: " . $league['name'] . "</h1><table style='margin:auto' cellpadding='10'>";        
            foreach ($userRequest as $user) {
                if($user['leagueId'] == $league['id']) {
                    if($user['username'] == $thisUser['username'])
                        echo "<tr><td><b>TEAM: " . $user['teamName'] . '</b></td>'
                         . "<td><b>Total Score: " . $user["score"] . "</b></td></tr>";
                    else
                        echo "<tr><td>TEAM: " . $user['teamName'] . '</td>'
                         . "<td>Total Score: " . $user["score"] . "</td></tr>";
                    }
            }
            echo "</table>";
            $userRequest = $db->query("SELECT * FROM user");
        }    
    }
    $leagueRequest = $db->query("SELECT * FROM league");
}
?>
        </div>
        <br /><form style="text-align:center" action="basketball.php" method="POST">
            <input type="hidden" name="usr" value ="">
            <input type="hidden" name="pwd" value ="">
            <input type="submit" value="Return to Team">
        </form> 
    </body>
</html>
