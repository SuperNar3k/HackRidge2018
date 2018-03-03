<!--This is PHP to be implemented in all pages-->
<link rel="stylesheet" href="../css/header.css">
<div id = "navBarWrapper">
    <nav id = "navBar" class = "topnav">
    	<a id = "homeLink" href = "index.php"><img id = "logo" src = "../rsc/text_logo.png"></a>
			<form id = "searchBarForm" method = "get" action = "search.php">	
				<input type = "text" id = "searchBar" name = "query" placeholder = "Search for recipes by name">
				<input type = "image" name = "submit" alt = "Search"> 
			</form>
			<?php if(isset($_SESSION["userID"])) : ?><!--Checking if student is logged in for different nav bar-->
        <a class = "baseText" id = "suggestionsLink" href = "suggestions.php">What Should I Eat Today?</a>
				<a class = "baseText" id = "myProfileLink" href = "profile.php">My Profile</a>
			<?php endif; ?>
    </nav>
</div>