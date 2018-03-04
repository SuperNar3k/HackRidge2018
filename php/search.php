<!DOCTYPE html>
<?php include 'database.php';
	session_start();
	
	//form submission check
	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM userrecipelikes WHERE userID= :userID AND recipeID = :recipeID";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['userID' => $_SESSION['userID'], 'recipeID' => $_POST['recipeID']]);
		$data = $stmt->fetchAll();
		
		if(count($data)===0){
			$sql = "INSERT INTO userrecipelikes (userID, recipeID) VALUES (:userID, :recipeID)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(['userID' => $_SESSION['userID'], 'recipeID' => $_POST['recipeID']]);
		}
	}
?>
<html>
	<head>
		<title>Foodle - Search</title>
		<link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/baseCSS.css">
		<link rel="stylesheet" href="../css/recipeList.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>

	<header id = "header"><?php include "header.php"; ?></header>

	<body>
		<div id = "footerPusher">
			<!--Get search Results-->
			
			<?php 
					echo '<h1 style = "text-align: center;">Displaying results similar to "', $_GET['query'],'"</h1>';
					
					//Get Search Results
					$resultsJSON = file_get_contents(API_SEARCH_URL."&q=".str_replace(" ", "%20", $_GET['query']));
					$results = json_decode($resultsJSON, true);

					//Top 5 Results
					echo '<div class = "card recipe">';
					if(count($results['recipes'])>=5){
						echo '<h2>Top 5 Results</h2>';
					}
					else{
						echo '<h2>Top ', count($results['recipes']), ' Results';
					}
					for($i = 0; $i<count($results['recipes']); $i++){
						$recipeJSON = file_get_contents(API_GET_URL."&rId=".$results['recipes'][$i]['recipe_id']);
						$recipeData = json_decode($recipeJSON, true);
						
						echo '<h3 style = "display: inline; margin-bottom: 10px; margin-right: 5px;">', $recipeData['recipe']['title'], '</h3>';
						echo '<form method = "post" style = "display:inline;">
						<input type = "hidden" name = "recipeID" value = "', $key,'">
						<input type = "submit" name = "submit" value = "Like This Recipe" class = "classicColor likeButton" style = "margin-bottom: 10px; display: inline;"></form>';
						echo '<img src = "', $recipeData['recipe']['image_url'],'" alt = "Image: ', $recipeData['recipe']['title'],'" class  = "foodImg">';
						echo '<br>';
						echo '<div style = "margin: 0 auto; text-align: center;">';
						echo '<p>Ingredients:</p>';
						echo '<ul style = "padding: 0;">';
						for($j = 0; $j<count($recipeData['recipe']['ingredients']); $j++){
							echo '<li>', $recipeData['recipe']['ingredients'][$j],'</li>';
						}
						echo '</ul>';
						echo '<a href = "', $recipeData['recipe']['source_url'],'" target = "_blank" style = "top:0; margin: 5px;">Read More</a>';
						echo '</div>';
						echo '<hr>';
					}
					echo '</div>';
					
					//Test page:
					// echo '<div class = "card recipe">
					// <h2>Top 2 Results</h2>
					// <h3>PB And J</h3>
					// <img alt = "Image: PB and J" class = "foodImg">
					// <br><ul>
					// <li>Peanut Butter</li>
					// <li>Bread</li>
					// <li>Jelly</li>
					// </ul>
					// <a>Read More</a>
					// <hr>
					// <h3>PB And J</h3>
					// <img alt = "Image: PB and J" class = "foodImg">
					// <ul>
					// <li>Peanut Butter</li>
					// <li>Bread</li>
					// <li>Jelly</li>
					// </ul>
					// <a>Read More</a>
					// <hr>
					// </div>';
			?>
		</div>
	</body>
	<footer id = "footer"><?php include 'footer.php'?></footer>
</html>