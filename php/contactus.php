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
                    <h4 class="top">Talk to a Human</h4>
                    <p class="topinfo">You're not going to hit a ridiculously long phone menu when you call us. Your email
                        <br></br>isn't going to the inbox abyss, never to be seen or heard from again.
                        <br></br>At Foodle, we provide the exceptional service we'd want to experience ourselves!</p>
                </div>
            <div style="display: flex; margin-left:150px; margin-right:150px;">
                <div class="left">
                    <h2 class="left_h2">Foodle strives to provide
                        <br>the best service possible with<br>every contact!</h2>
                    <p  class="left_p">We operate in an industry built on trust. This can only be achieved through
                        <br>communication and experienced support – from the first contact past your
                        <br>ten-year anniversary.</p>
                    <h4 class="left_h4">At Foodle you always talk to a human!</h4><br>
                </div>
                <div style="border-style: solid; border-color: rgba(26,70,141, 0.4); border-left: 2px; margin-left: 50px; margin-right:410px; margin-top:5px;">
                </div>
                <span class="right">
                    <h3 class="right_h3">Offices</h3>
                    <p class="right_p">1731 Rose Street<br>Arlington Heights, IL, 60005</p>
                    <h3 class="right_h3">Direct Contact</h3>
                    <p class="right_p"><span>Phone: (847) 614-4162<br>Fax: (708) 272-8643<br></span>Email: <a href="mailto:info@choicescreening.com">foodle@gmail.com</a></p>
                </div>
            </div>
        </div>
    </body>
    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>