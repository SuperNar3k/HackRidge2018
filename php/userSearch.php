<?php
include 'database.php';
session_start(); 
include 'logincheck.php';
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["email" => $_POST['userSearch']]); 
    $rowCount = $stmt->rowCount();
    $url = 'location: profile.php?userID='.$_POST["userRequesting"];

    if($rowCount==0){header($url);}
    else{
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $userID = $user->userID;
        $sql = "INSERT INTO `usertouserfriendspending`(`requesterID`, `recipientID`) VALUES (:userID0,:userID1)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["userID0" => $_POST['userRequesting'],"userID1" => $userID]);
        echo $_POST["userRequesting"];
        header($url);
    }
?>
