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
                <td><input name = "userPID[', $i,']" value = "',(int)$_GET['userID'],'" class = "classicColor" type = "hidden"></td>
                <td><input name = "userID[', $i,']" value = "',$data[$i],'" class = "classicColor" type = "hidden">',$firstName,' ',$lastName,'</td>';
        echo '<td><input name = "deny[', $i,']" value = "Deny" class = "classicColor" type = "submit"></td>';
        echo '<td><input name = "accept[', $i,']" value = "Accept" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color:red"></td>';
        echo '</tr>';

    }

    echo '</table></form>';
    endif;

    $sql = "SELECT * FROM usertouserfriends WHERE recipientID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $pendingRequests = $stmt->rowCount();
    $data = array();
    $data = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);


    echo 
    '<table>';

    for($i = 0; $i <$friends; $i++){

        $sql = "SELECT * FROM users WHERE userID=:UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["UserID" => $data[$i]]);     
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $firstName = $user->firstName;
        $lastName = $user->lastName;

        echo '<tr>
                <td><input name = "userPID[', $i,']" value = "',(int)$_GET['userID'],'" class = "classicColor" type = "hidden"></td>
                <td><input name = "userID[', $i,']" value = "',$data[$i],'" class = "classicColor" type = "hidden">',$firstName,' ',$lastName,'</td>';
        echo '<td><input name = "deny[', $i,']" value = "Deny" class = "classicColor" type = "submit"></td>';
        echo '<td><input name = "accept[', $i,']" value = "Accept" class = "classicColor" type = "submit" style = "margin-right: 0px; background-color:red"></td>';
        echo '</tr>';

    }

    echo '</table>';

?>