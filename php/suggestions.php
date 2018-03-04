<!DOCTYPE html>
<?php 
	require 'database.php';
	session_start();
	require 'loginCheck.php';
	
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
		<title>Foodle - Suggestions</title>
		<link rel="shortcut icon" href="../rsc//favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/baseCSS.css">
		<link rel="stylesheet" href="../css/recipeList.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <header id = "header"><?php include "header.php"; ?></header>

  <body style = "background-image: url(../rsc/indexBackground.jpg)">
		<div id = "footerPusher">
			<?php 
				include 'getSuggestions.php';
				
				foreach($suggestions as $key => $value){
					echo '<div class="card recipe">';
					$recipeJSON = file_get_contents(API_GET_URL."&rId=".$key);
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
					echo '</div></div>';
				}
				unset($key);
				unset($value);
			?>
		</div>
	</body>
	<footer id = "footer"><?php include 'footer.php'; ?></footer>
</html>