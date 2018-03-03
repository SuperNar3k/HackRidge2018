<!DOCTYPE html>
<html>

<body>
	Hey!
	<?php
	require 'database.php';
	
	if(defined('API_SEARCH_URL')){
		echo 'defined';
	}
	else{
		echo 'not defined';
	}
	$json = file_get_contents(API_SEARCH_URL."&q=".$_POST['query']);
	$searchData = json_decode($json, true);
	var_dump($searchData['recipes'][$_POST['number']]['recipe_id']);
	
	$firstRecipeJSON = file_get_contents(API_GET_URL."&rId=".$searchData['recipes'][$_POST['number']]['recipe_id']);
	$firstRecipe = json_decode($firstRecipeJSON, true);
	var_dump($firstRecipe['recipe']['ingredients']);
	?>
</body>

</html>