<?php
    include 'database.php';
    session_start(); 
    include 'logincheck.php';

    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => $_SESSION['userID']]); 
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $BirthDate = $user->birthday;
    $About = $user->about;
    $Address = $user->address;
    $Phones = $user->phone;

?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>Foodle - Home</title>
        <link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/baseCSS.css">
        <link rel="stylesheet" href="../css/edit-profile.css">
        <link href="../lib/aos-master/dist/aos.css" rel="stylesheet">
        <script src="../lib/aos-master/dist/aos.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
                AOS.init();
            });
        </script>
        <!--<script src="../js/index.js"></script>-->

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        <div id = "footerPusher">
                <form  id="login" class="form"  action="edit-profileScripts.php" method="post">
                    <?php
                        echo'
                            <table style="width=100%;" class = "listing">
                                <tr>
                                    <td><label>Phone :</label></td>';
                                    if(!empty($phone)){echo'<td><input class="input2" name="phone" type="text" value="',$Phone,'"></td>';}else{echo'<td><input name="phone" type="text" placeholder="Eg: 630 542 8972"></td>';}
                                echo'</tr>
                                <tr>
                                    <td><label>Address :</label></td>';
                                    if(!empty($phone)){echo'<td><input class="input2" name="address" maxlength="32" type="text" value="',$Address,'" ></td>';}else{echo'<td><input name="address" maxlength="32" type="text" placeholder="78S 738 Winchester Ave" ></td>';}
                                echo'</tr>
                                <tr>
                                    <td><label>Birth Day :</label></td>
                                    <td><input name="birthdate" type="date" value="',$BirthDate,'"></td>
                                </tr>
                                <tr>
                                    <td><label>About section :</label></td><td>
                                    <textarea rows="4" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" cols="36" maxlength="128" style="overflow:hidden" width="250" name="about" form="eventCreator">', $About, '</textarea></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td style = "text-align:center;"><input type="submit" value="Submit Changes" class = "classicColor"/></td>
                                </tr>
                            </table>';
                        ?>
                </form>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>





