<!--This is PHP to be implemented in all pages-->
<div id = "navBarWrapper">
    <nav id = "navBar" class = "topnav">
        <?php if(isset($_SESSION["StudentID"])) : ?><!--Checking if student is logged in for different nav bar-->
            <a id = "homeLink" href = "index.php"><img id = "logo" src = "..\rsc\text_logo.png"></a>
            <a class = "baseText" id = "" href = "events.php">Community Events</a>
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