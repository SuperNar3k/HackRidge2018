<?php session_start();
    require 'loginCheck.php';
    require 'database.php';

    $sql = "SELECT * FROM usertouserfriendspending WHERE recipientID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $pendingRequests = $stmt->rowCount();
    $data = array();
    $data = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);


    if($_SESSION['userID']==(int)$_GET['userID']):
    echo '<form method="POST" action="friendsAdder.php"><table>';

    for($i = 0; $i <$pendingRequests; $i++){

        $sql = "SELECT * FROM users WHERE userID=:UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["UserID" => $data[$i]]);     
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $firstName = $user->firstName;
        $lastName = $user->lastName;

        echo '<tr>
                <input name = "userPID[', $i,']" value = "',(int)$_GET['userID'],'" class = "classicColor" type = "hidden">
                <input name = "userID[', $i,']" value = "',$data[$i],'" class = "classicColor" type = "hidden"><td>',$firstName,' ',$lastName,'</td>';
        echo '<td><input name = "deny[', $i,']" value = "Deny" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color: rgb(255,153,0);"></td>';
        echo '<td><input name = "accept[', $i,']" value = "Accept" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color: rgba(4,133,255,.8);"></td>';
        echo '</tr>';

    }

    echo '</table></form>';
    endif;

    $sql = "SELECT * FROM usertouserfriends WHERE userID0=:UserID OR userID1=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $numberOfFriends = $stmt->rowCount();
    $data = array();
    $data = $stmt->fetchAll();

    echo 
    '<table><tr><td style="color: rgba(4,133,255,.8);font-size:32px;">Friends</td></tr>';
    for($i = 0; $i <$numberOfFriends; $i++){
         if($data[$i][0]==(int)$_GET['userID']){$friendID = $data[$i][1];}
             else{$friendID = $data[$i][0];}
        $sql = "SELECT * FROM users WHERE userID=:UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["UserID" => $friendID]);     
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $firstName = $user->firstName;
        $lastName = $user->lastName;

        echo '<tr>
                <td style="padding-left:40px;"><a style="text-decoration:none;color: rgb(255,153,0);" href="profile.php?userID=',$friendID,'">',$firstName,' ',$lastName,'</a></td>';
       echo '</tr>';

    }

    echo '</table>';

?>