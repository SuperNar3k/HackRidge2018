<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";

    // Pulling data from "sitecontent" for the About Us and Attention sections

        $sql = "SELECT * FROM sitecontent WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => 1]);
        $sc = $stmt->fetch(PDO::FETCH_OBJ);
        $aboutus = $sc->aboutUs;
        $attention = $sc->attention;
?>
<html>
    <head>

        <title>LPNHS - Home</title>
        
        <link rel="stylesheet" href="../css/baseCSS.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        <script>
            $(document).ready(function(){
                $("#homeLink").addClass("active");
            });
        </script>

    </head>

    <header id = "header"><?php include "header.php"; ?></header>

    <body>
        
        <img id = "fixedBGImg" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png"><!--Fixed Image in Background-->
        
        <div id = "footerPusher">

            <!--Home Page Main Image Card-->

            <div id = "frontImg" class = "card" style = "width: 50%;">
                <img src = "https://www.lphs.org/cms/lib/IL01904769/Centricity/Domain/70/NHS%202017.jpg" style = "width: 100%;"><!--NHS picture of students-->
                <p style = "font-style: italic; font-size: 16px;">Promoting appropriate recognition of students who reflect outstanding accomplishments in the areas of scholarship, leadership, character, and service.</p>
            </div>
        
            <!--Home Page Panels-->

            <?php if(trim($attention)!==""): ?> <!--Checking if Attention is empty, if so then don't display-->
                <div id = "importantInfo" class = "urgent panel">
                    <p class = "urgentText">Attention:</p>
                    <p class = "urgentText"><?php echo $attention; ?></p>
                </div>
            <?php else: endif; ?>
                <div id = "aboutUs" class = "classic panel">
                    <p>About Us...</p>
                    <p><?php echo $aboutus; ?></p>
                </div>
        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>