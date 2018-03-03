<!--This is PHP to be implemented in all pages-->

<div id = "banner" style = "width:100%">

	<img id = "LPLogo" src = "https://www.lphs.org/cms/lib/IL01904769/Centricity/Template/GlobalAssets/images///logos/_default.png"><!--LPHS Logo-->
        
	<h1 class = "baseText" style = "padding-bottom: 0px; margin-bottom:0px; color: #005da3;  font-size:48px;cursor: pointer;;"><span id = "LPNHS" onclick = "location.href='index.php'" title = "LPNHS - Home">Lake Park High School National Honor Society</span></h1>
	<h2 class = "baseText" style = "padding-top: 0px; margin-top:0px; color: #666; font-size:18px;">Scholarship | Leadership | Character | Service</h2>
	<?php if(isset($_SESSION["StudentID"])) : ?><!--Checking if user is logged in for either sign in or sign out button-->
		<div id = "headerLogout" class = "headerSignIn"><button id = "headerLogoutButton">Sign Out</button></div>
	<?php else: ?>
		<div id = "headerLogin" class = "headerSignIn"><button id = "headerLoginButton">Sign In</button></div>
	<?php endif; ?>

</div>
    
<div id = "navBarWrapper">
    <nav id = "navBar" class = "topnav">
        <?php if(isset($_SESSION["StudentID"])) : ?><!--Checking if student is logged in for different nav bar-->
            <a class = "baseText" id = "homeLink" href = "index.php">Home</a>
            <a class = "baseText" id = "eventsLink" href = "events.php">Community Events</a>
            <a class = "baseText" id = "membersLink" href = "members.php">Members</a>
			<a class = "baseText" id = "myProfileLink" href = "my-profile.php">My Profile</a>
        <?php else :?><!--If not logged in then the nav bar below-->
            <a class = "baseText" id = "homeLink" href = "index.php">Home</a>
            <a class = "baseText" id = "communityInvolvementLink" href = "community-involvement.php">Community Events</a>
            <a class = "baseText" id = "membersLink" href = "members.php">Members</a>
			<a class = "baseText" id = "whatItTakesLink" href = "what-it-takes.php">What It Takes</a>
        <?php endif; ?>
    </nav>
</div>