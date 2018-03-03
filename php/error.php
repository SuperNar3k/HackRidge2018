<!DOCTYPE html>
<?php 
    session_start();
    if(isset($_COOKIE['LOGINERROR'])) {
        $Error = $_COOKIE['LOGINERROR'];
    
    }
    else{$Error="Unidentified error!";}
?>
<html>


	<head>

		<link rel="stylesheet" href="baseCSS.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>

		<title>LP NHS - Error</title>

	</head>

    <header id = "header"><?php include "header.php"; ?></header>

	<body>
        <div id = "footerPusher">

            <img id = "fixedBGImg" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png"> <!--Fixed image in background-->

			<div id="login" class="form" action="session.php" method="post" style="height:150px;width:400px;">
				<h2 class="logTitle" style="text-align:center;">ERROR</h2>
					<hr class="loghr">

				<label class="field" style="text-align:center;">
					Error: <?php echo $Error;?>
				</label>
			</div>	

        </div>
    </body>

    <footer id = "footer"><?php include "footer.php"; ?></footer>

</html>