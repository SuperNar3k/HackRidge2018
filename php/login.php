<!Doctype HTML>
<?php 
    session_start();
    include "database.php";

    $loginError = false;

    // Checking for error cookie

        if(isset($_COOKIE['LOGINERROR'])) {
            setcookie("LOGINERROR", "", time()-3600);
            $loginError = true;
        }

?>
<html>
    <head>

        <title>LPNHS - Login</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/baseCSS.css">


    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
		<div id = "footerPusher">

            <img id = "fixedBGImg" src = "..\rsc\text_logo.png"> <!--Fixed image in background-->

            <form id="login" class="form" action="session.php" method="post" style="height:350px;">
                <div>
                    <p style = "font-size: 30px; font-weight: bold;">Log in</p>
                    <br/>
                    <?php 
                        if($loginError){
                            echo '<p style = "color: red; font-weight: bold;">Incorrect email or password</p>';
                        }
                    ?>
                    <p>Email</p>
                    <input placeholder = "Enter Email" type = "email" name = "email" autofocus required>
                    <br/><br/>
                    <p>Password</p>
                    <input placeholder = "Enter Password" type = "password" name = "password" required>
                    <br/>
                    <br/>

                    <a href="signup.php" id="newAccount">Don't have an account?</a>

                    <button id = "loginButton" type = "submit" value="Log In">Sign In</button>
                </div>
                <div>
                </div>                
            </form>
            
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>