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
        <script src="../js/headerJQuery.js"></script>
        
    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body> 

        <div id = "footerPusher">

            <div style ="display: flex;min-height:100%">
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