<!DOCTYPE html>
<?php session_start();?>
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
    <div id ="container">
    <header id = "header"><?php include "header.php"; ?></header>
            <div class="body">
                <form id="signup" class="form" action="signupConfirmed.php" method="post">
                        <h2 class="logTitle">Sign Up</h2>
                        <hr class="loghr">

                    <label class="field">
                        <input type="text" placeholder="First Name*" name="firstNameSignUp" id="firstNameSignUp" class="input">
                    </label>
            
                    <label class="field">
                        <input type="text" placeholder="Last Name*" name="lastNameSignUp" id="lastNameSignUp" class="input">
                    </label>        

                    <label class="field">
                        <input type="text" placeholder="Email*" name="emailSignUp" id="emailSignUp" class="input">
                    </label>  

                    <label class="field">     
                        <input type="password" placeholder="Password*" name="passwordSignUp" id="passwordSignUp" class="input">
                    </label>

                    <label class="field">
                        
                        <input type="password" placeholder="Confirm Password*" name="passwordConfirmSignUp" id="passwordConfirmLogIn" class="input">
                    </label>

                    <a href="login.php" id="newAccount" style="padding:10px;">Have an account?</a>

                    <input type="submit" class="logButton" value="Sign Up"> 
                </form>
            </div>
            <footer id = "footer"><?php include "footer.php"; ?></footer>
    </div>
</body>
</html>