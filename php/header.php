<!--This is PHP to be implemented in all pages-->
<link rel="stylesheet" href="../css/header.css">
<div id = "navBarWrapper">
    <nav id = "navBar" class = "topnav">
    	<a id = "homeLink" href = "index.php"><img id = "logo" src = "../rsc/text_logo.png"></a>
			<form id = "searchBarForm" method = "get" action = "search.php">	
				<div id = "searchBarWrapper">
					<input type = "text" id = "searchBar" name = "query" placeholder = "Search for recipes by name">
					<input type = "submit" id = "searchSubmit" name = "submit"> 
				</div>	
			</form>
			<?php if(isset($_SESSION["userID"])) : ?><!--Checking if student is logged in for different nav bar-->
        <a class = "baseText" id = "suggestionsLink" href = "suggestions.php">What Should I Eat Today?</a>
				<a class = "baseText" id = "myProfileLink" href = "profile.php?userID=<?php echo $_SESSION['userID'];?>">My Profile</a>
				<a class = "classicColor" id = "logoutButton" href = "logout.php">Log Out</a>
			<?php else: ?>
				<a class = "classicColor" id = "loginButton" href = "login.php">Log In</a>
			<?php endif; ?>
    </nav>
</div>