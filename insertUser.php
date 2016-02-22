<?php
$username = $_POST['usr'];
$password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
$teamName = $_POST['teamName'];
$leagueId = $_POST['leagueId'];
for($i=1;$i<6;$i++) {
    $player[$i] = $_POST["players$i"];
}

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

if($db->query("INSERT INTO user (username, password, teamName, leagueId) VALUES (\"$username\", \"$password\", \"$teamName\", $leagueId)"))
        echo "<h3 style='color:green; text-align:center'>USER CREATED!</h3>";
$newId = $db->lastInsertId();
for($j=1; $j<6; $j++) {
    $thisPlayer = $player[$j];
    $db->query("INSERT INTO player (name, userId) VALUES (\"$thisPlayer\", $newId)");
}
echo " <br /><br /><a style='text-align:center' href='ballLogin.php'>Go To Login</a>";
?>
