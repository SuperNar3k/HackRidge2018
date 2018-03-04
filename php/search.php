<!DOCTYPE html>
<?php include 'database.php';
	session_start();
?>
<html>
	<head>
		<title>Foodle - Search</title>
		<link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/baseCSS.css">
		<link rel="stylesheet" href="../css/search.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>

	<header id = "header"><?php include "header.php"; ?></header>

	<body>
		<div id = "footerPusher">
			<!--Get search Results-->
			
			<?php 
					echo '<h1>Displaying results similar to ', $_GET['query'],'</h1>';
					/*
					//Get Search Results
					$resultsJSON = file_get_contents(API_SEARCH_URL."&q=".str_replace(" ", "%20", $_GET['query']));
					$results = json_decode($resultsJSON, true);

					//Top 5 Results
					echo '<div class = "card">';
					if(count($results['recipes'])>=5){
						echo '<h2>Top 5 Results</h2>';
					}
					else{
						echo '<h2>Top ', count($results['recipes']), ' Results';
					}
					for($i = 0; $i<5; $i++){
						$recipeJSON = file_get_contents(API_GET_URL."&rId=".$results['recipes'][$i]['recipe_id']);
						$recipeData = json_decode($recipeJSON, true);
						
						echo '<h3>', $recipeData['recipe']['title'], '</h3>';
						echo '<img src = "', $recipeData['recipe']['img_url'],'" alt = "Image: ', $recipeData['recipe']['title'],'" style = "float:left;">';
						echo '<br><ul>';
						for($j = 0; $j<count($recipeData['recipe']['ingredients']); $j++){
							echo '<li>', $recipeData['recipe']['ingredients'][$j],'</li>';
						}
						echo '</ul>';
						echo '<a href = "', $recipeData['recipe']['source_url'],'" target = "_blank">Read More</a>';
						echo '<hr>';
					}
					echo '</div>';
					*/
					//Test page:
					echo '<div class = "card recipe">
					<h2>Top 1 Result</h2>
					<h3>PB And J</h3>
					<img alt = "Image: PB and J" style = "float: left;">
					<br><ul>
					<li>Peanut Butter</li>
					<li>Bread</li>
					<li>Jelly</li>
					</ul>
					<a>Read More</a>
					<hr>
					</div>';
			
					echo '<div class = "card recipe">
					<h2>Top 1 Result</h2>
					<h3>PB And J</h3>
					<img alt = "Image: PB and J" style = "float: left;">
					<br><ul>
					<li>Peanut Butter</li>
					<li>Bread</li>
					<li>Jelly</li>
					</ul>
					<a>Read More</a>
					<hr>
					</div>';
			?>
		</div>
	</body>
	<footer><?php include 'footer.php'?></footer>
</html>