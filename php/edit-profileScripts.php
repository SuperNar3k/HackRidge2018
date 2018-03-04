<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";
    include "adminCheck.php";

    // Checking all previous entries for content and then updating the event

		if(!empty($_POST['phone']))
        {
            $sql = "UPDATE users SET phone=:phone WHERE userID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["phone" => $_POST['phone'], "userID" => $_SESSION['userID']]); 
        }
		if(!empty($_POST['address']))
        {
            $sql = "UPDATE users SET address=:address WHERE userID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["address" => $_POST['address'], "userID" => $_SESSION['userID']]); 
        }
        if(!empty($_POST['birthdate']))
        {
            $sql = "UPDATE users SET birthday=:birthdate WHERE userID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["birthdate" => $_POST['birthdate'], "userID" => $_SESSION['userID']]); 
        }
        if(!empty($_POST['about']))
        {
            $sql = "UPDATE users SET about=:about WHERE userID=:userID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["about" => $_POST['about'], "userID" => $_SESSION['userID']]);  
        }

    // Setting cookie for Submit confirmation and rerouting user
    
    header('Location: profile.php?userID='.$_POST["userPID"][0]);    
?>
