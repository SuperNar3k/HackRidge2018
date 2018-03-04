<!Doctype HTML>
<?php
    session_start();
    include "database.php";
    $invalid = false;
    if(isset($_GET['login'])){$invalid = true;}

?>
<html>
    <head>

        <title>Foodle - Login</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/baseCSS.css">


    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
		<div id = "footerPusher">

            <form id="login" class="form" action="session.php" method="post">
                <div>
                    <h id="logTitle">Log in</h>
                    <hr class="loghr">
                    <br/>
                    <?php 
                        if($invalid){
                            echo '<p style = "color: red; text-align: center; font-size: 16px; font-weight: bold;">Incorrect email or password</p>';
                        }
                    ?>
                    <input class="input2" placeholder = "Email*" type = "email" name = "email" autofocus required>
                    <br/><br/>
                    <input class="input2" placeholder = "Password*" type = "password" name = "password" required>
                    <br/>
                    <br/>
                    <div>
                        <a href="signup.php" id="newAccount" style="padding:10px; float:right;">Don't have an account?</a>
                    </div>
                        <div>
                            <a href="forgotPassword.php" id="newAccount" style="padding:10px; float:left;">Forgot your password?</a>
                        </div>
                    <button id = "loginButton" type = "submit" value="Log In">Sign In</button>
                </div>              
            </form>
            
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html> 