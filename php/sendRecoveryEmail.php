<?php 
    require 'database.php';
    session_start();

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $userData = $stmt->fetchAll();
    if($stmt->rowCount()>0){
        //Mail password reset link
        // The message
        $message = "You are recieving this email because you requested a password reset for your Foodle Acount.
        \r\nPlease click the following link or paste it into your web browser to reset your password. https://foodle.tech/php/passwordReset.php?hash=".$userData[0][4]."&userID=".$userData[0][0]
        ."\r\nIf this does not pertain to you, please ignore this email.";

        // In case any of our lines are larger than 70 characters, we should use wordwrap()
        $message = wordwrap($message, 70, "\r\n");

        $headers = 'From: passwordReset@foodle.tech';
        // Send
        //mail($email, '[Foodle] Password Reset Request', $message, $headers);
        echo 'Email function not yet available. Password reset request can not be made at this time.';
    }
    else{
        header("location: forgotPassword.php?email=unknown");
    }
?>