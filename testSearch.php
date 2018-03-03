<!DOCTYPE HTML>
<html>

<body>
	<?php
	$json = "food2fork.com/api/search?key=29c623e7eb9072ca0d13d2353c2e1a3f&q=".$_POST['query'];
	$searchData = json_decode($json, true);
	
	$firstRecipeJSON = "food2fork.com/api/get?key=29c623e7eb9072ca0d13d2353c2e1a3f&rId=".$searchData[$_POST['number']]['recipe_id'];
	$firstRecipe = json_decode($firstRecipeJSON, true);
	echo $firstRecipe->"ingredients";
	?>
</body>

</html>