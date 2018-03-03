<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";
    include "loginCheck.php";
    
?>
<html>
    <head>

        <title>Foodle Profile</title>
        
        <link rel="stylesheet" href="../css/baseCSS.css">
        <link rel="stylesheet" href="../css/profile.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        
    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body> 
        <div id = "footerPusher">

            <img id = "fixedBGImg" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png"><!--Fixed Image in Background-->

            <div style ="display: flex;min-height:calc(-355px + 100vh)">
                <div style="background-color: #333;min-height: 100%; width: 30%; padding: 0px;">
                    f
                </div>
                
                <div style="background-color: #333;min-height: 100%; width: 70%; padding: 0px;">
                    d
                </div>
            </div>
            
        </div>
    </body>
        
    <footer id = "footer"><?php include 'footer.php';?></footer>

</html>