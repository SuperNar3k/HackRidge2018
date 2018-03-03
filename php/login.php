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

            <img id = "fixedBGImg" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png"> <!--Fixed image in background-->

            <form id="login" class="form" action="session.php" method="post" style="height:350px;">
                <div>
                    <p style = "font-size: 30px; text-decoration: underline;">Sign in</p>
                    <br/>
                    <?php 
                        if($loginError){
                            echo '<p style = "color: red; font-weight: bold;">Incorrect email or password</p>';
                        }
                    ?>
                    <p>Email</p>
                    <input id = "loginEmail" placeholder = "Email" type = "email" name = "email" autofocus required>
                    <br/><br/>
                    <p>Password</p>
                    <input id = "loginPassword" placeholder = "Password" type = "password" name = "password" required>
                    <br/>
                    <br/>
                    <button id = "loginButton" type = "submit" value="Log In">Sign In</button>
                </div>
                <div>
                    <img id = "tester" style = "margin: auto;" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png">
                </div>                
            </form>
            
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>