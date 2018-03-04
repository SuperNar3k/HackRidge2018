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
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
            });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        <div id = "footerPusher" style="background-image: url(https://www.fusionduniya.com/wp-content/uploads/2017/05/about-us.jpg); background-repeat: no-repeat; background-size: 1903px 952px;">

            <p id = "au"> Our website is designed to bring you new and flavorful dishes. Using your likes and previous dishes, it can find you new recipes to create for you, family, and friends. 
            Using the database from Food 2 Fork, we are able to introduce unique recipes from all around the world.
                 We can guarantee you will find amazing flavors for your taste buds.
             </p>

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>