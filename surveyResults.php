<?php
$Sport = $_POST["sport"];
$Player = $_POST["basketball"];
$Ball = $_POST["ball"];
$Shoe = $_POST["shoe"];

$file1 = fopen("survey.txt", "r");
$Soccer = fgets($file1);
$Football = fgets($file1);
$Basketball = fgets($file1);
$Volleyball = fgets($file1);
$Baseball = fgets($file1);
switch($Sport) {
    case "Soccer":
        $Soccer += 1;
        break;
    case "Football":
        $Football += 1;
        break;
    case "Basketball":
        $Basketball += 1;
        break;
    case "Volleyball":
        $Volleyball += 1;
        break;
    case "Baseball":
        $Baseball += 1;
        break;
}
$sportTotal = $Soccer + $Football + $Basketball + $Volleyball + $Baseball;
$SoccerP = $Soccer / $sportTotal * 100;
$FootballP = $Football / $sportTotal * 100;
$BasketballP = $Basketball / $sportTotal * 100;
$VolleyballP = $Volleyball / $sportTotal * 100;
$BaseballP = $Baseball / $sportTotal * 100;

$Kobe = fgets($file1);
$Lebron = fgets($file1);
$Kevin = fgets($file1);
$Stephen = fgets($file1);
$Blake = fgets($file1);
switch($Player) {
    case "Kobe":
        $Kobe += 1;
        break;
    case "Lebron":
        $Lebron += 1;
        break;
    case "Kevin":
        $Kevin += 1;
        break;
    case "Stephen":
        $Stephen += 1;
        break;
    case "Blake":
        $Blake += 1;
        break;
}
$playerTotal = $Kobe + $Lebron + $Kevin + $Stephen + $Blake;
$KobeP = $Kobe / $playerTotal * 100;
$LebronP = $Lebron / $playerTotal * 100;
$KevinP = $Kevin / $playerTotal * 100;
$StephenP = $Stephen / $playerTotal * 100;
$BlakeP = $Blake / $playerTotal * 100;

$Wilson= fgets($file1);
$Spalding = fgets($file1);
$Sterling = fgets($file1);
$Baden = fgets($file1);
switch($Ball) {
    case "Wilson":
        $Wilson += 1;
        break;
    case "Spalding":
        $Spalding += 1;
        break;
    case "Sterling":
        $Sterling += 1;
        break;
    case "Baden":
        $Baden += 1;
        break;
}
$ballTotal = $Wilson + $Spalding + $Sterling + $Baden;
$WilsonP = $Wilson / $ballTotal * 100;
$SpaldingP = $Spalding / $ballTotal * 100;
$SterlingP = $Sterling / $ballTotal * 100;
$BadenP = $Baden / $ballTotal * 100;

$Nike = fgets($file1);
$Adidas = fgets($file1);
$Balance = fgets($file1);
$Sketcher = fgets($file1);
$Reebok = fgets($file1);
switch($Shoe) {
    case "Nike":
        $Nike += 1;
        break;
    case "Adidas":
        $Adidas += 1;
        break;
    case "Balance":
        $Balance += 1;
        break;
    case "Sketcher":
        $Sketcher += 1;
        break;
    case "Reebok":
        $Reebok += 1;
        break;
}
$shoeTotal = $Nike + $Adidas + $Balance + $Sketcher + $Reebok;
$NikeP = $Nike / $shoeTotal * 100;
$AdidasP = $Adidas / $shoeTotal * 100;
$BalanceP = $Balance / $shoeTotal * 100;
$SketcherP = $Sketcher / $shoeTotal * 100;
$ReebokP = $Reebok / $shoeTotal * 100;
echo "<h4>BEST SPORTS:</h4><br /><fieldset>Soccer: $SoccerP%<br />Football: $FootballP%<br />"
        . "Basketball: $BasketballP%<br />Volleyball: $VolleyballP%<br />"
        . "Baseball: $BaseballP%<br /><h4>FAVORITE BASKETBALL PLAYER:</h4>"
        . "Kobe Bryant: $KobeP%<br />Lebron James: $LebronP%<br />Kevin Durant: "
        . "$KevinP%<br />Stephen Curry: $StephenP%<br />Blake Griffin: "
        . "$BlakeP%<br /><h4>FAVORITE BALL:</h4><br />Wilson: $WilsonP%<br />"
        . "Spalding: $SpaldingP%<br />Sterling: $SterlingP%<br />"
        . "Baden: $BadenP%<br /><h4>FAVORITE SHOES:</h4>Nike: $NikeP%<br />Adidas: "
        . "$AdidasP%<br />New Balance: $BalanceP%<br />Sketchers: $SketcherP%<br />"
        . "Reebok: $ReebokP%<br /></fieldset>";
$file2 = fopen("survey.txt", "w+");
$txt = "$Soccer\n$Football$Basketball\n$Volleyball\n$Baseball\n$Kobe\n$Lebron\n"
        . "$Kevin\n$Stephen\n$Blake\n$Wilson\n$Spalding\n$Sterling\n$Baden\n"
        . "$Nike\n$Adidas\n$Balance\n$Sketcher\n$Reebok";
fwrite($file2, $txt);
fclose($file2);
fclose($file1);
?>


