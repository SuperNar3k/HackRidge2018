<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>Foodle - Home</title>
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/baseCSS.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../js/headerJQuery.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
            });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        <div id = "footerPusher" style="background-image: url(../rsc/kitchen.jpg)">
            <p id="maintext">Not sure what to make? We have you covered.</p>
            <span class="mainicons">
                <img class="mainicons_image" src="../rsc/recipebook.png"></img>
                <div class="mainicons_text">
                    <span>Search new recipes!</span>
                </div>

                <img class="mainicons_image" src="../rsc/friend.png">
                <div class="mainicons_text">
                    <span>See what your friends like!</span>
                </div>
                <img class="mainicons_image" src="../rsc/brain.png">
                <div class="mainicons_text">
                    <span>API Suggests food you should try!</span>
                </div>
            </span>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>