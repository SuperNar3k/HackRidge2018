<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";
    include "loginCheck.php";
    

    $sql = "SELECT * FROM usertouserfriends WHERE userID0=:UserID OR userID1=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $numberOfFriends = $stmt->rowCount();

    $sql = "SELECT * FROM userrecipelikes WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $numberOfLikes = $stmt->rowCount();

    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $rowCount = $stmt->rowCount();

    if($rowCount==0){header('location: index.php');}
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $firstName = $user->firstName;
    $lastName = $user->lastName;
?>
<html>
    <head>

        <title>Foodle Profile</title>
        
        <link rel="stylesheet" href="../css/baseCSS.css">
        <link rel="stylesheet" href="../css/profile.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        function findGetParameter(parameterName) {
            var result = null,
                tmp = [];
            location.search
                .substr(1)
                .split("&")
                .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                });
            return result;
        }
        </script>
        
        <script>
            var myProfileTabActive = true;

            // Manages tab color to indicate which tab you are on

                $(document).ready(function(){
                //control tab color
                    $("#myProfileTab").click(function(){
                        $(this).removeClass("inactive");
                        $("#myLikesTab").addClass("inactive");
                        $("#myFriendsTab").addClass("inactive");
                    });
                    $("#myFriendsTab").click(function(){
                        $(this).removeClass("inactive");
                        $("#myLikesTab").addClass("inactive");
                        $("#myProfileTab").addClass("inactive");
                    });
                    $("#myLikesTab").click(function(){
                        $(this).removeClass("inactive");
                        $("#myFriendsTab").addClass("inactive");
                        $("#myProfileTab").addClass("inactive");
                    });
                });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body> 

        <div id = "footerPusher">
            <?php if($_SESSION['userID']==(int)$_GET['userID']):?>
                <div style ="display: flex;min-height:100%">
                    <div style="height: 100%; width: 20%; padding: 0px; margin: 0px;border-right: .1rem solid rgba(255,153,0,.3);margin-top:40px;padding-bottom: 40px;padding-top: 10px;margin-left:20px;">
                        <p>
                            <!--Get User Icon-->
                            <?php
                              $sql = "SELECT imageFilePath FROM users WHERE userID = :userID";
                              $stmt = $pdo->prepare($sql);
                              $stmt->execute(['userID' => $_SESSION['userID']]);
                              $userIconPath = $stmt->fetchAll();
                              echo '<img id = "userProfileImage" src = "../rsc/userIcons/', $userIconPath[0][0],'">';
                            ?>
                        </p>
                        <p>Hello, <?php echo $firstName,' ',$lastName;?></p>
                        <div id="tabs">
                            <div id="myProfileTab">My Profile<a></a></div>
                            <div id="myFriendsTab" class="inactive">My Friends<a><?php echo $numberOfFriends;?></a></div>
                            <div id="myLikesTab" class="inactive">My Likes<a><?php echo $numberOfLikes;?></a></div>
                        </div>
                    </div>

                    <div id="profileViewer" style="height: 100%; width: 80%; padding: 0px; margin: 0px;margin-top:40px;margin-right:20px; padding-bottom: 40px;padding-top: 10px;margin-left:20px;">
                        <script>
                            $(document).ready(function(){
                                $("#profileViewer").load("myProfile.php?userID="+findGetParameter('userID'));
                                $("#myProfileTab").click(function(){
                                    $("#profileViewer").load("myProfile.php?userID="+findGetParameter('userID'));
                                });
                                $("#myFriendsTab").click(function(){
                                    $("#profileViewer").load("myFriends.php?userID="+findGetParameter('userID'));
                                });
                                $("#myLikesTab").click(function(){
                                    $("#profileViewer").load("myLikes.php?userID="+findGetParameter('userID'));
                                });
                            });
                        </script>
                    </div>
                </div>
            <?php else:?>
                <div style ="display: flex;min-height:100%">
                    <div style="height: 100%; width: 20%; padding: 0px; margin: 0px;border-right: .1rem solid rgba(255,153,0,.3);margin-top:40px;padding-bottom: 40px;padding-top: 10px;margin-left:20px;">
                        <p>
                            <!--Get User Icon-->
                            <?php
                                $sql = "SELECT imageFilePath FROM users WHERE userID = :userID";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute(['userID' => $_SESSION['userID']]);
                                $userIconPath = $stmt->fetchAll();
                                echo '<img id = "userProfileImage" src = "../rsc/userIcons/', $userIconPath[0][0],'">';
                            ?>
                        </p>
                        <p><?php echo $firstName,' ',$lastName;?></p>
                        <div id="tabs">
                            <div id="myProfileTab">Profile<a></a></div>
                            <div id="myFriendsTab" class="inactive">Friends<a><?php echo $numberOfFriends;?></a></div>
                            <div id="myLikesTab" class="inactive">Likes<a><?php echo $numberOfLikes;?></a></div>
                        </div>
                    </div>

                    <div id="profileViewer" style="height: 100%; width: 80%; padding: 0px; padding-left:20px; margin: 0px;margin-top:40px;margin-right:20px; padding-bottom: 40px;padding-top: 10px;margin-left:20px;">
                        <script>
                            $(document).ready(function(){
                                $("#profileViewer").load("myProfile.php?userID="+findGetParameter('userID'));
                                $("#myProfileTab").click(function(){
                                    $("#profileViewer").load("myProfile.php?userID="+findGetParameter('userID'));
                                });
                                $("#myFriendsTab").click(function(){
                                    $("#profileViewer").load("myFriends.php?userID="+findGetParameter('userID'));
                                });
                                $("#myLikesTab").click(function(){
                                    $("#profileViewer").load("myLikes.php?userID="+findGetParameter('userID'));
                                });
                            });
                        </script>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </body>
        
    <footer id = "footer"><?php include 'footer.php';?></footer>

</html>