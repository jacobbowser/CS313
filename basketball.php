<!DOCTYPE html>
  <head>
     <link rel="stylesheet" type="text/css" href="styles.css" />
     <title> Fantasy Basketball </title>
  </head>
  <body>
<?php 
$username=$_POST["usr"];
$password=$_POST["pwd"];

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

$userRequest = $db->query("SELECT * FROM user WHERE username= (\"$username\") AND password= (\"$password\")");
$playerRequest = $db->query('SELECT * FROM player');

echo "<h3>Fantasy Basketball</h3><div style='text-align: center'><form action='score.php' method='POST'>" .
           "<input type='hidden' name='userId' value=$username /><input type='submit' value='SCORES' /></form>";

    foreach ($userRequest as $user) {
            echo "<h5>TEAM: " . $user['teamName'] . '</h5><form id="points" action="apply.php" method="POST"><table align="center">';
            foreach ($playerRequest as $player) {
                if($player['userId'] == $user['id']) {
                echo "<tr> <td>" . $player['name'] . "</td><td>Points: <input size='5' type='text' />"
                        . "</td><td>Rebounds: <input size='5' type='text' /></td><td>Assissts: <input size='5' type='text' />" .
                        "</td></tr>";
                }
            }
            echo "</table><input type='submit' /></from><br />Your Total Score: " . $user["score"];
            $playerRequest = $db->query('SELECT * FROM player');
        }
?>
    </div>
  </body>
</html>


