<?php
    session_start();
    include "database.php";

    // Checking previous input fields and assigning to variables

        if(isset($_POST["email"])) {
            $useremail = $_POST["email"];
        } 
        if(isset($_POST['password'])) {

            $userpassword = $_POST['password'];
        }
   
    // Pulling data from "students" where "Email" is the user inputed email

        $sql = "SELECT * FROM users WHERE email=:myEmail";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["myEmail" => $useremail]); 
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $rowCount = $stmt->rowCount();

    // Checking if there is a user with same email, if not, invalid

        if ($rowCount != 1) { 

            setcookie("LOGINERROR2","error", time() + (86400 * 30), "/");
            header("location: login.php");
            $dbEmail = $user->Email;
            $dbpassHash =$user->P;

        } else{
            // If the user asswordHash;
            $studentID = $user->StudentID;        

            // Check if the password matches, if not, invalid

                if($useremail === $dbEmail && password_verify($userpassword, $dbpassHash)) { 

                    // If successfull, start SESSION with "StudentID"

                        $_SESSION["userID"] = $userID;
                        header('Location: index.php'); 
                } else{
                    setcookie("LOGINERROR","error", time() + (86400 * 30), "/");
                    header("location: login.php");
                }
        }
?>