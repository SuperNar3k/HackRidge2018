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
    $birthday = $user->birthday;
    $phone = $user->phone;
    if(!empty($location)):
    echo '<div>
                <b style="font-size:28px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="text-decoration:none;margin-left:20px;color: rgba(100,100,100,.7);font-size:12px;" href="https://www.maps.google.com/maps/search/?api=1&query=', str_replace(" ", "+", $location),'+IL" target = "_blank"><img style="height:16px;width:16px;opacity:.7;padding:0px"  src = "../rsc/mapLocationMarker.png">', $location, '</a>
         ';
    else:
        echo '<div>
                <b style="font-size:28px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="margin-left:20px;color: rgba(100,100,100,.7);font-size:12px;"><img style="height:16px;width:16px;opacity:.7;padding:0px" src = "../rsc/mapLocationMarker.png"> Anonymous </a>
         ';
    endif;
    if($birthday!='0000-00-00'):
        $formatted_date = date('m/d/Y', strtotime($birthday));
        echo '<br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;">Birthday: <img style="height:13px;width:13px;opacity:.7;padding:0px" src = "../rsc/birthdayImage.png">', $formatted_date, '</a>
            ';
    else:
        echo '<br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;">Birthday: <img style="height:13px;width:13px;opacity:.7;padding:0px" src = "../rsc/birthdayImage.png"> Anonymous</a>
            ';
    endif;
    if(!empty($phone)):
        echo '<br>
                <br>
                <b>Contact me:</b><br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;">Phone:', $phone, '</a><br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;"><img style="height:13px;width:13px;opacity:.7;padding:0px" src = "../rsc/messagePictures.png"></a>
            </div>';
    else:
        echo '<br>
                <br>
                <b>Contact me:</b><br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;">Phone: N/A</a><br>
                <a style="color: rgba(100,100,100,.7);font-size:12px;margin-top:8px;"><img style="height:50px;width:50px;opacity:.7;padding:0px" src = "../rsc/messagePictures.png"></a>
            </div>';
    endif;

?>