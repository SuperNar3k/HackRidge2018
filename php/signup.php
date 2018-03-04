<!DOCTYPE html>
<?php session_start();

    // Checking for issues if previus signup
        $invalidP = false;
        $invalidE = false; 
        if(isset($_GET['signup'])) {
            if($_GET['signup']==="passwordsdontmatch"){
                $invalidP = true;
            }
            else{
                $invalidE = true;
            }
        }

?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/baseCSS.css">
        <script src="js/jquery.js"></script>
        <script src="js/form.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <title>Foodle- Log In</title>
    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>

        <div id ="footerpusher">
                <div class="body">
                    <form id="signup" class="form" action="signupConfirmed.php" method="post">
                            <h2 id="logTitle">Sign Up</h2>
                            <hr class="loghr">
                            <?php 
                                if($invalidP){
                                    echo '<p style = "color: red; text-align: center; font-size: 16px; font-weight: bold;">Passwords do not match</p>';
                                }
                                else if($invalidE){
                                    echo '<p style = "color: red; text-align: center; font-size: 16px; font-weight: bold;">An account with that email already exists</p>';

                                }
                            ?>
                        <label class="field">
                            <input type="text" placeholder="First Name*" name="firstNameSignUp" id="firstNameSignUp" class="input" required>
                        </label>
                
                        <label class="field">
                            <input type="text" placeholder="Last Name*" name="lastNameSignUp" id="lastNameSignUp" class="input" required>
                        </label>        

                        <label class="field">
                            <input type="text" placeholder="Email*" name="emailSignUp" id="emailSignUp" class="input" required>
                        </label>  

                        <label class="field">     
                            <input type="password" placeholder="Password*" name="passwordSignUp" id="passwordSignUp" class="input" required>
                        </label>

                        <label class="field">
                            
                            <input type="password" placeholder="Confirm Password*" name="passwordConfirmSignUp" id="passwordConfirmLogIn" class="input" required>
                        </label>

                        <a href="login.php" id="newAccount" style="padding:10px;">Have an account?</a>

                        <input type="submit" class="logButton" value="Sign Up"> 
                    </form>
                </div>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>


</html>