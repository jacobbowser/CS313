function newImg() {
    document.getElementById("thisImg").src = "https://scontent-sea1-1.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/1491767_10208261167993029_2598890592665582535_n.jpg?oh=ba29b38ea937043151e1bc06fcdffa45&oe=56FC9059";
    document.getElementById("thisImg").width = 300;
}

function origImg() {
    document.getElementById("thisImg").src = "https://scontent-sea1-1.xx.fbcdn.net/hphotos-xfa1/v/t1.0-0/p206x206/12039230_10204664131435280_6303937694274217668_n.jpg?oh=4c5193b3e43265b11fff789362bef41c&oe=573D08E2";
    document.getElementById("thisImg").width = 200;
}

function imgChange1(value) {
    switch(value)
        {
            case 1:
                document.getElementById("image1").innerHTML = "<img width='200' height='200' src='http://cliparts.co/cliparts/Lcd/jA7/LcdjA7oc4.png'>";
                break;
            case 2:
                document.getElementById("image1").innerHTML = "<img width='300' height='200' src='http://clipartion.com/wp-content/uploads/2015/11/rugby-ball-sports-clipart-pictures-png-wrt-a-football-seourpicz.png'>"; 
                break;
            case 3 :
                document.getElementById("image1").innerHTML = "<img width='200' height='200' src='http://www.cliparthut.com/clip-arts/1114/sports-equipment-clip-art-1114469.png'>"; 
                break;
            case 4:
                document.getElementById("image1").innerHTML = "<img width='200' height='200' src='http://images.clipartpanda.com/free-volleyball-clipart-RTAE99ETL.png'>";               
                break;
            case 5 :
                document.getElementById("image1").innerHTML = "<img width='200' height='200' src='http://cliparts.co/cliparts/6Bi/gKB/6BigKBMc8.png'>"; 
                break;     
        }
    }
    
function imgChange2(value) {
    switch(value)
        {
            case 1:
                document.getElementById("image2").innerHTML = "<img width='300' height='200' src='http://www.blackpressusa.com/wp-content/uploads/2013/11/kobebryant11.jpg'>";
                break;
            case 2:
                document.getElementById("image2").innerHTML = "<img width='400' height='200' src='http://www.trbimg.com/img-54ef2c74/turbine/la-sp-sn-lebron-james-son-college-offers-20150226'>"; 
                break;
            case 3 :
                document.getElementById("image2").innerHTML = "<img width='300' height='200' src='http://thefranchiseok.com/wp-content/uploads/2015/09/Kevin.jpg'>"; 
                break;
            case 4:
                document.getElementById("image2").innerHTML = "<img width='300' height='200' src='http://d2118lkw40i39g.cloudfront.net/wp-content/uploads/2015/06/cd0ymzcznguwzdbhnduynddiytjhm2yyzthlmtjjotqwyyznpwu1nja1yjkzmjy1mjq4nwmwowmxmji2mgmxzmnjzguz.jpeg'>";               
                break;
            case 5 :
                document.getElementById("image2").innerHTML = "<img width='300' height='200' src='http://i.kinja-img.com/gawker-media/image/upload/tz3pqbnyoe7cgq6gmd7q.jpg'>"; 
                break;     
        }
    }

function imgChange3(value) {
    switch(value)
        {
            case 1:
                document.getElementById("image3").innerHTML = "<img width='200' height='200' src='http://www.wilson.com/servlet/resize/59341/1200/1200/WTB0516R_Evolution_High_School_Game_Ball_main/'>";
                break;
            case 2:
                document.getElementById("image3").innerHTML = "<img width='200' height='200' src='http://www.sportsballshop.co.uk/acatalog/spaldingreplica1.jpg'>"; 
                break;
            case 3 :
                document.getElementById("image3").innerHTML = "<img width='200' height='200' src='http://ecx.images-amazon.com/images/I/61SS3uJb%2BUL._SX355_.jpg'>"; 
                break;
            case 4:
                document.getElementById("image3").innerHTML = "<img width='200' height='200' src='http://ecx.images-amazon.com/images/I/51CK7TsOAYL._SX355_.jpg'>";               
                break;  
        }
    }
    
    function imgChange4(value) {
    switch(value)
        {
            case 1:
                document.getElementById("image4").innerHTML = "<img width='300' height='200' src='http://content.nike.com/content/dam/one-nike/en_us/season-2014-fl/Shop/Launch/8-9/Nike-Hyperdunk-2014-Chi-Medial.jpg.transform/default/image.jpg'>";
                break;
            case 2:
                document.getElementById("image4").innerHTML = "<img width='300' height='200' src='http://ecx.images-amazon.com/images/I/81vzaNBBEBL._UX500_.jpg'>"; 
                break;
            case 3 :
                document.getElementById("image4").innerHTML = "<img width='350' height='200' src='http://s7d5.scene7.com/is/image/NB/bb581bk_nb_02_i?$dw_temp_default_gallery$'>"; 
                break;
            case 4:
                document.getElementById("image4").innerHTML = "<img width='300' height='200' src='http://ecx.images-amazon.com/images/I/51rHn6v-ieL._SX395_.jpg'>";               
                break;
            case 5 :
                document.getElementById("image4").innerHTML = "<img width='300' height='200' src='http://cdn.sneakernews.com/wp-content/uploads/2013/08/10-reebok-basketball-sneakers-always-in-production-03-570x367.jpg'>"; 
                break;     
        }
    }