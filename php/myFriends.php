<?php session_start();
    require 'loginCheck.php';
    require 'database.php';

    $sql = "SELECT * FROM usertouserfriendspending WHERE recipientID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $pendingRequests = $stmt->rowCount();
    $data = array();
    $data = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);


    if($_SESSION['userID']==(int)$_GET['userID'] && $pendingRequests!==0):
    echo '<form method="POST" action="friendsAdder.php"><table><tr><td style="color: rgba(4,133,255,.8);font-size:32px;">Pending Friend Requests</td></tr>';

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
                echo '<td><input name = "accept[', $i,']" value = "Accept" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color: rgba(4,133,255,.8);"></td>';
                echo '<td><input name = "deny[', $i,']" value = "Deny" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color: rgb(255,153,0);"></td>';
        echo '</tr>';

    }

    echo '</table></form>';
    endif;


    if($_SESSION['userID']==(int)$_GET['userID']):
        echo '<br><a style="text-decoration:none;font-size:26px;color:white;">Add Friends: </a><br>
        <form method="POST" class="specialButtonCoolThing" action="userSearch.php"><a><input type="hidden" name="userRequesting" value="',$_SESSION['userID'],'"><input type = "email" class="specialButtonCoolThing" class="input2" style="height: 24px;" placeholder = "Eg: Johnny27@gmail.com" name = "userSearch" required></a><a><button class="specialButtonCoolThing" style="border-radius: 0px; height:30px;background-color: rgba(255,153,0,.8);cursor: pointer;" type = "submit">Send Friend Request</button>
        </a></form>';
    endif;
    $sql = "SELECT * FROM usertouserfriends WHERE userID0=:UserID OR userID1=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $numberOfFriends = $stmt->rowCount();
    $data = array();
    $data = $stmt->fetchAll();
    if($numberOfFriends!==0){
    

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

    echo '</table>';}
    else if($_SESSION['userID']==(int)$_GET['userID']){
        echo 
    '<table><tr><td style="color: rgba(4,133,255,.8);font-size:32px;">Friends</td></tr>';
    echo '<tr>
                <td style="padding-left:40px;color: rgb(255,153,0);">You currently have 0 friends try adding some!</td>';
       echo '</tr>';
    echo '</table>';
    }
    else{
        echo 
    '<table><tr><td style="color: rgba(4,133,255,.8);font-size:32px;">Friends</td></tr>';
    echo '<tr>
                <td style="padding-left:40px;color: rgb(255,153,0);">This user is new to Foodle</td>';
       echo '</tr>';
    echo '</table>';
    }

?>