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
    $email = $user->email;
    $location = $user->address;
    $birthday = $user->birthday;
    $phone = $user->phone;
    $about = $user->about;
    if(!empty($location)):
    echo '<div>
                <b style="font-size:36px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="text-decoration:none;margin-left:10px;color: rgba(100,100,100,.7);font-size:14px;" href="https://www.maps.google.com/maps/search/?api=1&query=', str_replace(" ", "+", $location),'+IL" target = "_blank"><img style="height:16px;width:16px;opacity:.7;padding:0px"  src = "../rsc/mapLocationMarker.png">', $location, '</a>
         ';
    else:
        echo '<div>
                <b style="font-size:36px;color: rgba(4,133,255,.8);">',$firstName,' ',$lastName,'</b> 
                <a style="margin-left:20px;color: rgba(100,100,100,.7);font-size:14px;"><img style="height:16px;width:16px;opacity:.7;padding:0px" src = "../rsc/mapLocationMarker.png"> Hidden </a>
         ';
    endif;
    if($birthday!='0000-00-00'):
        $formatted_date = date('m/d/Y', strtotime($birthday));
        echo '<br>
                <a style="color: rgba(100,100,100,.7);font-size:14px;margin-top:8px;">Birthday: <img style="height:13px;width:13px;opacity:.7;padding:0px;margin-right:5px;" src = "../rsc/birthdayImage.png">', $formatted_date, '</a>
            ';
    else:
        echo '<br>
                <a style="color: rgba(100,100,100,.7);font-size:14px;margin-top:8px;">Birthday: <img style="height:13px;width:13px;opacity:.7;padding:0px;margin-right:5px;" src = "../rsc/birthdayImage.png"> Private</a>
            ';
    endif;
    if(!empty($about)):
        echo '<br>
                <br>
                <b style="color: rgba(4,133,255,.8);">About me:</b><br><br>
                <a style="margin-left:20px;color: #333;font-size:20px;margin-top:8px;"><a style="margin-left:20px;color: #333;font-size:18px;margin-top:8px;">', $about, '</a></a><br><br>
            ';

    endif;
    if(!empty($phone)):
        echo '
                <br>
                <b style="color: rgba(4,133,255,.8);">Contact me:</b><br><br>
                <a style="margin-left:20px;color: rgb(255,153,0);font-size:20px;margin-top:8px;">Email:<a style="margin-left:20px;color: #333;font-size:18px;margin-top:8px;">',$email,'</a> </a><br><br>
                <a style="margin-left:20px;color: rgb(255,153,0);font-size:20px;margin-top:8px;">Phone:<a href="tel:',str_replace(' ', '', $phone),'" style="margin-left:20px;color: blue;font-size:18px;margin-top:8px;">+ ', $phone,'</a></a><br><br>
                <a style="margin-left:20px;color: rgb(255,153,0);font-size:20px;margin-top:8px;margin-bottom:16px;">Message Me:  <br><a style="margin-left:40px;color: #333;font-size:18px;margin-top:8px;"><img style="height:30px;width:120px;opacity:.7;padding:0px" src = "../rsc/messagePicture.png"></a></a>
            ';
    else:
        echo '<br>
                <br>
                <b style="color: rgba(4,133,255,.8);">Contact me:</b><br><br>
                <a style="margin-left:20px;color: rgb(255,153,0);font-size:20px;margin-top:8px;">Email:<a style="margin-left:20px;color: #333;font-size:18px;margin-top:8px;">',$email,'</a> </a><br><br>
                <a style="margin-left:20px;color: rgb(255,153,0);font-size:20px;margin-top:8px;margin-bottom:16px;">Message Me: <br><a style="margin-left:40px;color: #333;font-size:18px;margin-top:8px;"><img style="height:30px;width:120px;opacity:.7;padding:0px" src = "../rsc/messagePicture.png"></a></a>
            ';
    endif;
    if($_SESSION['userID']==(int)$_GET['userID']):
       echo' <br><br><a style="text-decoration:none;color: rgba(4,133,255,.8);margin-left: 200px;" href="edit-profile.php">Edit Profile</a>';
    endif;
?>