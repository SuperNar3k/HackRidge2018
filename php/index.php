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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
            });
        </script>
        <script src="../js/index.js"></script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        <div id = "footerPusher" style="background-image: url(../rsc/indexBackground.jpg)">
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

            <div id="wrapperDiv">
                <p id = "ourPurposeText">We are here to help!</p>
            </div>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>