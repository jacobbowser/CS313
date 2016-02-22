<?php 
  session_start();
?>
<!DOCTYPE html>
  <head>
     <link rel="stylesheet" type="text/css" href="styles.css" />
     <title> Fantasy Basketball </title>
  </head>
  <body>
<?php 
if($_POST["usr"]) {
    $_SESSION["username"]=$_POST["usr"];
    $_SESSION["password"]=$_POST["pwd"];
}

$username = $_SESSION["username"];
$password = $_SESSION["password"];
//$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
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
$db = new PDO("mysql:host=$dbHost;dbname=basketball", 'jacobbowser', 'password', $pdo_options);
$passwordHash = $db->query("SELECT password FROM user WHERE username= \"$username\"");
$passwordHash1 = $passwordHash->fetch();
$passwordHash2 = $passwordHash1["password"];

if (password_verify($password, $passwordHash2)) {
    $userRequest = $db->query("SELECT * FROM user WHERE username= (\"$username\")");
    $playerRequest = $db->query('SELECT * FROM player');

    echo "<h3>Fantasy Basketball</h3><div style='text-align: center'><form action='score.php' method='POST'>" .
           "<input type='hidden' name='userId' value=$username /><input type='submit' value='SCORES' /></form>";

    foreach ($userRequest as $user) {
            echo "<h5>TEAM: " . $user['teamName'] . '</h5><form id="points" action="apply.php" method="POST"><table align="center">';
            $i = 1;
            foreach ($playerRequest as $player) {
                if($player['userId'] == $user['id']) {
                echo "<tr> <td>" . $player['name'] . "</td><td>Points: <input size='5' type='text' name='points$i'/>"
                        . "</td><td>Rebounds: <input size='5' type='text' name='rebounds$i' /></td><td>Assists: <input size='5' type='text' name='assists$i' />" .
                        "</td></tr>";
                $i++;
                }
            }
            echo "</table><br /><input type='submit' value='Apply' /></from><br /><br />Your Total Score: " . $user["score"];
            $playerRequest = $db->query('SELECT * FROM player');
        }
}
else {
    echo "<h3 style='color:red; text-align:center'> Incorrect Username or Password</h3>";
}
?>
    </div>
  </body>
</html>


