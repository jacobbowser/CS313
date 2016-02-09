<!DOCTYPE html>
  <head>
     <link rel="stylesheet" type="text/css" href="styles.css" />
     <title> Fantasy Basketball </title>
  </head>
  <body>
<?php 

//$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
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
$db = new PDO("mysql:host=$dbHost;dbname=basketball", $dbUser, $dbPassword, $pdo_options);

$leagueRequest = $db->query('SELECT * FROM league');
$userRequest = $db->query('SELECT * FROM user');
$playerRequest = $db->query('SELECT * FROM player');
?>
    <div style="text-align: center">
    
        <a href="score.php">SCORES</a>
<?php
echo '<h2> Fantasy Basketball </h2>';
foreach ($leagueRequest as $league) {
    echo "<h3>LEAGUE :" . $league['name'] . "</h3>";
    foreach ($userRequest as $user) {
        if($user['leagueId'] == $league['id']) {
            echo "<h4>TEAM: " . $user['teamName'] . '</h4><table align="center">';
            foreach ($playerRequest as $player) {
                if($player['userId'] == $user['id']) {
                echo "<tr> <td>" . $player['name'] . "</td><td>Points: <input type='text' />"
                        . "</td><td>Rebounds: <input type='text' /></td><td>Assissts: <input type='text' />" .
                        "</td><td>Score: </tr>";
                }
            }
            echo "</table>Total Score: " . $user["score"];
            $playerRequest = $db->query('SELECT * FROM player');
        }
    }
    $userRequest = $db->query('SELECT * FROM user');
}
?>
    </div>
  </body>
</html>


