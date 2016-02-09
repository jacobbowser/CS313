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
$db = new PDO("mysql:host=$dbHost;dbname=basketball", 'jacobbowser', 'password', $pdo_options);

$leagueRequest = $db->query('SELECT * FROM league');
$userRequest = $db->query('SELECT * FROM user');
$playerRequest = $db->query('SELECT * FROM player');
?>
    <div style="text-align: center">
    
<?php
echo '<h3> Fantasy Basketball </h3>';
foreach ($leagueRequest as $league) {
    echo "<h4>LEAGUE :" . $league['name'] . "</h4>";
    foreach ($userRequest as $user) {
        if($user['leagueId'] == $league['id']) {
            echo "<h5>TEAM: " . $user['teamName'] . "</h5>";
            foreach ($playerRequest as $player) {
                if($player['userId'] == $user['id']) {
                echo "<h6>" . $player['name'] . "  Points: " . $player['points'] .
                        "  Rebounds: " . $player['rebounds'] . "  Assissts: " .
                        $player['assissts'] . "  Score: " . $player['score'] . "</h6>";
                }
            }
            $playerRequest = $db->query('SELECT * FROM player');
        }
    }
    $userRequest = $db->query('SELECT * FROM user');
}
?>
    </div>
  </body>
</html>


