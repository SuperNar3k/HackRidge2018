<!DOCTYPE HTML>
<html>

<body>
	Hey!
	<?php
	$json = file_get_contents("https://food2fork.com/api/search?key=29c623e7eb9072ca0d13d2353c2e1a3f&q=".$_POST['query']);
	$searchData = json_decode($json, true);
	var_dump($searchData['recipes'][$_POST['number']]['recipe_id']);
	
	$firstRecipeJSON = file_get_contents("https://food2fork.com/api/get?key=29c623e7eb9072ca0d13d2353c2e1a3f&rId=".$searchData['recipes'][$_POST['number']]['recipe_id']);
	$firstRecipe = json_decode($firstRecipeJSON, true);
	var_dump($firstRecipe['recipe']['ingredients']);
	?>
</body>

</html>