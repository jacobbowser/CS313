

<!DOCTYPE HTML>
<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" type="text/css" href="form.css"/>
        <script type='text/javascript' src='changes.js'></script>
    </head>
    <body>
        <form id="survey" action='surveyResults.php' method='POST'>
            <h2>What is the best sport?</h2>
            <fieldset>
                <input type="radio" name="sport" value="Soccer" onchange="imgChange1(1)" required>Soccer</input>
                <input type="radio" name="sport" value="Football" onchange="imgChange1(2)">Football</input>
                <input type="radio" name="sport" value="Basketball" onchange="imgChange1(3)">Basketball</input>
                <input type="radio" name="sport" value="Volleyball" onchange="imgChange1(4)">Volleyball</input>
                <input type="radio" name="sport" value="Baseball" onchange="imgChange1(5)">Baseball</input>
            </fieldset><br />
            <div id='image1'>
            </div>
            <h2>Who is your favorite basketball player?</h2>
            <fieldset>
                <input type="radio" name="basketball" value="Kobe Bryant" onchange="imgChange2(1)" required>
                Kobe Bryant</input>
                <input type="radio" name="basketball" value="Lebron James" onchange="imgChange2(2)">
                Lebron James</input>
                <input type="radio" name="basketball" value="Kevin Durant" onchange="imgChange2(3)">
                Kevin Durant</input>
                <input type="radio" name="basketball" value="Stephen Curry" onchange="imgChange2(4)">
                Stephen Curry</input>
                <input type="radio" name="basketball" value="Blake Griffin" onchange="imgChange2(5)">
                Blake Griffin</input>
            </fieldset><br />
            <div id='image2'>
            </div>
            <h2>What is your favorite type of ball?</h2>
            <fieldset>
                <input type="radio" name="ball" value="Wilson" onchange="imgChange3(1)"required>Wilson</input>
                <input type="radio" name="ball" value="Spalding" onchange="imgChange3(2)">Spalding</input>
                <input type="radio" name="ball" value="Sterling" onchange="imgChange3(3)">Sterling</input>
                <input type="radio" name="ball" value="Baden" onchange="imgChange3(4)">Baden</input>
            </fieldset><br />
            <div id='image3'>
            </div>
            <h2>What is favorite kind of shoe?</h2>
            <fieldset>
                <input type="radio" name="shoe" value="Nike" onchange="imgChange4(1)" required>Nike</input>
                <input type="radio" name="shoe" value="Adidas" onchange="imgChange4(2)">Adidas</input>
                <input type="radio" name="shoe" value="New Balance" onchange="imgChange4(3)">New Balance</input>
                <input type="radio" name="shoe" value="Sketchers" onchange="imgChange4(4)">Sketchers</input>
                <input type="radio" name="shoe" value="Reebok" onchange="imgChange4(5)">Reebok</input>
            </fieldset><br />
            <div id='image4'>
            </div>
            <input type='submit' value='Submit'></input>      <input type='Reset' value='Clear'></input>
        </form>
        <br /><a href='surveyResults.php'>Results</a> 
    </body>
    
</html>

