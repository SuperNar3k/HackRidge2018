<!Doctype HTML>
<?php 
    session_start();
    include "database.php";

    $loginError = false;

    // Checking for error cookie

        if(isset($_COOKIE['LOGINERROR'])) {
            setcookie("LOGINERROR", "", time()-3600);
                echo "true";
            $loginError = true;
        }

?>
<html>
    <head>

        <title>LPNHS - Login</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        <link rel="stylesheet" href="baseCSS.css">
        <style>
            body{
                margin: 0px;
                background-color: #005da3;
                text-align: center;
            }
            #login{
                display: inline-block;
                margin: 10% auto;
                padding: 30px;
                background-color: #333;
                border-radius: 15px;
                text-align: left;
            }
            #login div{
                display: inline-block;
                padding: 30px;
            }
            #login button{
                border: none;
                padding: 10px;
                border-radius: 15px;
                font-size: 12px;
                margin-top: 10px;
                margin-bottom: 0px;
                background-color: #005da3;
                color: white;
                
                font-family: Bookman, sans-serif;
                font-size: 24px;
            }

            #login p{
                margin: 5px 0px;
                color: white;
                text-align: left;
                font-family: Bookman, sans-serif;
                font-size: 24px;
            }
            #login input{
                font-family: Bookman, sans-serif;
                font-size: 24px;
            }
        </style>

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