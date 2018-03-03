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
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/baseCSS.css">


    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
		<div id = "footerPusher">

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
            </form>
            
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cssFolder/login.css">
    <link rel="stylesheet" href="cssFolder/homePage.css">
    <script src="js/jquery.js"></script>
    <script src="js/form.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <title>Log In</title>
</head>
<body>
<div id="container">
<header id = "header"><?php include "header.php"; ?></header>
        <div class="body">
            <form id="login" class="form" action="session.php" method="post" style="height:350px;">
                    <h2 class="logTitle">Log In</h2>
                    <hr class="loghr">

                <label class="field">
                    <input type="text" placeholder="Email" name="email" id="emailLogIn" class="input">
                </label>
                <label class="field">
            
                    <input type="password" placeholder="Password" name="password" id="passwordLogIn" class="input">
                </label>

                <a href="signup.php" id="newAccount" style="padding:10px;">Don't have an account?</a>
                <a href="signup.php" id="newAccount" style="padding:10px; float:left;">Forgot your password?</a>
                
                <input type="submit" class="logButton" value="Log In">
                
            </form>
        </div>
        <footer id = "footer"><?php include "footer.php"; ?></footer>
</div>
</body>
</html>