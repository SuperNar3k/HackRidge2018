<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";
    include "loginCheck.php";
    
    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
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
        <script src="../js/headerJQuery.js"></script>
        
    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body> 

        <div id = "footerPusher">

            <div style ="display: flex;min-height:100%">
                <div style="height: 100%; width: 30%; padding: 0px; margin: 0px; border-right: .1rem solid rgba(0,0,0,.1);margin-top:20px;margin-left:20px;">
                    <p>
                        <img id = "userProfileImage" src = "../rsc/defaultUserIcon.png">
                    </p>
                    <p>Hello, <?php echo $firstName,' ',$lastName;?></p>
                    <table style= "display: block;">
                        <tr class="myProfileTab">My Profile</tr>
                        <tr class="myGroupsTab">My Groups</tr>
                        <tr class="myLikesTab">My Likes</tr>
                    </table>
                </div>

                <div class="profileViewer" style="height: 100%; width: 70%; padding: 0px; margin: 0px;margin-top:20px;margin-right:20px; margin-left:20px;">
                    <script>
                        $(document).ready(function(){
                            $("#profileViewer").load("myProfile.php");
                            $("#myProfileTab").click(function(){
                                $("#profileViewer").load("myProfile.php");
                            });
                            $("#myGroupsTab").click(function(){
                                $("#profileViewer").load("myGroups.php");
                            });
                            $("#myLikesTab").click(function(){
                                $("#profileViewer").load("myLikes.php");
                            });
                        });
                    </script>
                </div>
            </div>
            
        </div>
    </body>
        
    <footer id = "footer"><?php include 'footer.php';?></footer>

</html>