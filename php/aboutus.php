<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>Foodle - About Us</title>
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
        <div id = "footerPusher">

            <p> Our website is designed to bring you new and flavorful dishes. Using your likes and previous dishes, it can find you new recipes to create for you, family, and friends. 

                </p>

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>