<?php
include 'database.php';
session_start();
include 'logincheck.php';
$sql = "SELECT * FROM usertouserfriendspending WHERE recipientID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => $_POST['userPID'][0]]); 
    $pendingRequests = $stmt->rowCount();

for($i = 0; $i<$pendingRequests; $i++){


    if(isset($_POST["accept"][$i])){

        // Updates the information of user chosen based on previous fields entered

            $sql = "INSERT INTO `usertouserfriends`(`userID0`, `userID1`) VALUES (:user1,:user2)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["user1"=>$_POST['userPID'][0], "user2"=>$_POST["userID"][$i]]);

            $sql = "DELETE FROM usertouserfriendspending WHERE requesterID=:userRID AND recipientID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["userRID" => $_POST["userID"][$i], "userID" => $_POST['userPID'][0]]);
            header('Location: profile.php');
    }
    elseif(isset($_POST["deny"][$i])){

        // Removes the user chosen

            $sql = "DELETE FROM usertouserfriendspending WHERE requesterID=:userRID AND recipientID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["userRID" => $_POST["userID"][$i], "userID" => $_POST['userPID'][0]]);
            header('Location: profile.php');
    }
}
?>