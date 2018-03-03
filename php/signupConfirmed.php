<?php
session_start();
//----------
//username needs to come from session
//----------
    if(isset($_POST["firstNameSignUp"])) {
        $firstname = $_POST["firstNameSignUp"];
       
    } 
    else{setcookie("ERROR","First Name is blank.", time() + (86400 * 30), "/");header("location: error.php");}
    if(isset($_POST["lastNameSignUp"])) {
        
        $lastname = $_POST["lastNameSignUp"];
         
    }
    else{setcookie("ERROR","Last Name is blank.", time() + (86400 * 30), "/");header("location: error.php");}
    if(isset($_POST["emailSignUp"])) {

        $useremail = $_POST["emailSignUp"];
 
    }
    else{setcookie("ERROR","Email is blank.", time() + (86400 * 30), "/");header("location: error.php");}
    if(isset($_POST["passwordSignUp"])) {
        
        $userpassword = $_POST["passwordSignUp"];
         
    }
    else{setcookie("ERROR","Password is blank.", time() + (86400 * 30), "/");header("location: error.php");}
    if(isset($_POST["passwordConfirmSignUp"])) {
        
        $userpasswordConfirm = $_POST["passwordConfirmSignUp"];
         
    }
    else{setcookie("ERROR","Password confirm is blank.", time() + (86400 * 30), "/");header("location: error.php");}
            
   
    

    include "database.php";

    //collecting rows of emails with same email
    $sql = "SELECT * FROM users WHERE email=:myEmail";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["myEmail" => $useremail]); 
    $email = $stmt->fetch(PDO::FETCH_OBJ);
    $rowCountemail = $stmt->rowCount();


    if ($rowCountemail == 1) { 
        
        setcookie("signupERROR","That email is already taken.", time() + (86400 * 30), "/");
        header("location: signup.php");

    }else if ($userpassword != $userpasswordConfirm) { 
        
        setcookie("signupERROR","Your password does not match the other.", time() + (86400 * 30), "/");
        header("location: signup.php");
        
    }else{ 
        //if only data is unique
        //create new user
        $sql = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `passwordHash`, `imageFilePath`) VALUES (:firstName, :lastName,:email, :pass, :ifp)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["firstName" => $firstname, "lastName" => $lastname, "email" => $useremail, "pass" => password_hash($userpassword, PASSWORD_DEFAULT), "ifp" => "defaultUserIcon.png"]);
        header("location: login.php");
    }
    ?>