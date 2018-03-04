<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>Foodle - Home</title>
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/baseCSS.css">
        <link rel="stylesheet" href="../css/index.css">
        <link href="../lib/aos-master/dist/aos.css" rel="stylesheet">
        <script src="../lib/aos-master/dist/aos.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
                AOS.init();
            });
        </script>
        <!--<script src="../js/index.js"></script>-->

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body style = "background-image: url(../rsc/indexBackground.jpg)">
        <div id = "footerPusher">
            <p id="maintext">Not sure what to eat? We've got you covered.</p>
            <span class="mainicons">
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/recipebook.png"></img>
                  <div class="mainicons_text">
                      <p id="searchCaption" class = "mainicons_caption">Search for new recipes</p>
                  </div>
                </div>
                
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/friend.png">
                  <div class="mainicons_text">
                      <p id = "friendsCaption" class = "mainicons_caption">See what your friends like</p>
                  </div>
                </div>
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/brain.png">
                  <div class="mainicons_text">
                      <p id = "suggestionsCaption" class = "mainicons_caption">View smart meal suggestions</p>
                  </div>
                </div>
            </span>

            <div id="wrapperDiv" data-aos="fade-left">
                <img src="../rsc/text_logo.png" style = "display:block; margin:0 auto;">
                <p style = "margin-top: 50px; margin-bottom: 0px;">Powered By </p>
                <img src="http://food2fork.com/F2F/static/images/webLogo.png" style = "display:block; margin:0 auto;">
            </div>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>