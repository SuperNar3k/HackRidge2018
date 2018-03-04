<?php 
    session_start();
    require 'loginCheck.php';
    require 'database.php';
    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $rowCount = $stmt->rowCount();
    if($rowCount==0){header('location: index.php');}
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $firstName = $user->firstName;
    $lastName = $user->lastName;
    $location = $user->address;
    if(!empty($location)):
    echo '<div>
                <b style="font-size:28px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="text-decoration:none;margin-left:20px;color: rgba(100,100,100,.7);font-size:12px;" href="https://www.maps.google.com/maps/search/?api=1&query=', str_replace(" ", "+", $location),'+IL" target = "_blank"><img style="height:16px;width:16px;opacity:.7;padding:0px" id = "userProfileImage" src = "../rsc/mapLocationMarker.png">', $location, '</a>
         </div>';
    else:
        echo '<div>
                <b style="font-size:28px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="margin-left:20px;color: rgba(100,100,100,.7);font-size:12px;"><img style="height:16px;width:16px;opacity:.7;padding:0px" id = "userProfileImage" src = "../rsc/mapLocationMarker.png"> Unknown </a>
         </div>';
    endif;

?>