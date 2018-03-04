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
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/recipebook.jpg"></img>
                  <div class="mainicons_text">
                      <p>Search for new recipes</p>
                  </div>
                </div>
                
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/friend.jpg">
                  <div class="mainicons_text">
                      <p>See what your friends like</p>
                  </div>
                </div>
                <div class="mainicons_wrapper">
                  <img class="mainicons_image" src="../rsc/brain.jpg">
                  <div class="mainicons_text">
                      <p>View AI meal suggestions</p>
                  </div>
                </div>
            </span>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>