<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>Foodle - Contact Us</title>
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/baseCSS.css">
        <link rel="stylesheet" href="../css/contactus.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
            });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        <div id = "footerPusher">
            <div id="top">
                <h1>Talk to a Human</h1>
            </div>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>