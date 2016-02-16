<?php

$username = $_POST['usr'];
$password = $_POST['pwd'];
$teamName = $_POST['teamName'];
$leagueId = $_POST['leagueId'];
$i = 0;
foreach($_POST['players'] as $players) {
    $player[$i] = $players;
    $i++;
}
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

if($db->query("INSERT INTO user (username, password, teamName, leagueId) VALUES (\"$username\", \"$password\", \"$teamName\", $leagueId)"))
        echo "<h3 style='color:green'>USER CREATED!</h3>";
$newId = $db->lastInsertId();
for($j=0; $j<5; $j++) {
    $thisPlayer = $player[$j];
    $db->query("UPDATE player SET userId=$newId WHERE id = $thisPlayer");
        
}
echo " <br /><br /><a href='ballLogin.php'>Go To Login</a>";
?>
