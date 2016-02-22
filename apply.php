<?php
session_start();
?>
<!DOCTYPE html>
<?php
$totalScore = 0;
for($i=1;$i<6;$i++) {
    $points[$i] = $_POST["points$i"];
    $rebounds[$i] = $_POST["rebounds$i"];
    $assists[$i] = $_POST["assists$i"];
    
    $pScore[$i] = ($points[$i] + 2 * $rebounds[$i] + 2 * $assists[$i]);
    $totalScore += $pScore[$i];
}

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
$username = $_SESSION["username"];
$scoreRequest = $db->query("SELECT score FROM user WHERE username= \"$username\"");
$scoreRequest1 = $scoreRequest->fetch();
$scoreRequest2 = $scoreRequest1['score'];
$totalScore += $scoreRequest2;

if($db->query("UPDATE user SET score=$totalScore WHERE username= \"$username\"")) {
?>
<html>
    <head>
        
    </head>
    <body>
        <h2 style="color:green; text-align:center">New Scores Applied!</h2>
        <form style="text-align:center" action="basketball.php" method="POST">
            <input type="hidden" name="usr" value ="">
            <input type="hidden" name="pwd" value ="">
            <input type="submit" value="Return to Team">
        </form>
    </body>
</html>
<?php
} 
?>