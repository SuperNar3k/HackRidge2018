<?php
include 'database.php';
session_start(); 
include 'logincheck.php';
    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => $_POST['userSearch']]); 
    $rowCount = $stmt->rowCount();
    
    if($rowCount==0){header('location: profile.php?userID="',$_POST['userRequesting'],'"');}
    else{
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $userID = $user->userID;
        $sql = "INSERT INTO `usertouserfriendspending`(`requesterID`, `recipientID`) VALUES (:userID0,:userID1)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["userID0" => $_POST['userRequesting'],"userID1" => $userID]);
        header('location: profile.php?userID="',$_POST['userRequesting'],'"');
    }
?>
