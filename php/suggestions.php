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

  <body>
		<div id = "footerPusher">
			<?php 
				include 'getSuggestions.php';
				
				foreach($suggestions as $key => $value){
					echo '<div class="card recipe">';
					$recipeJSON = file_get_contents(API_GET_URL."&rId=".$key);
					$recipeData = json_decode($recipeJSON, true);
					
					echo '<h3>', $recipeData['recipe']['title'], '</h3>';
					echo '<img src = "', $recipeData['recipe']['image_url'],'" alt = "Image: ', $recipeData['recipe']['title'],'" class  = "foodImg">';
					echo '<br><ul>';
					for($j = 0; $j<count($recipeData['recipe']['ingredients']); $j++){
						echo '<li>', $recipeData['recipe']['ingredients'][$j],'</li>';
					}
					echo '</ul>';
					echo '<div style = "display:flex;"';
					echo '<a href = "', $recipeData['recipe']['source_url'],'" target = "_blank">Read More</a>';
					echo '<form method = "post">
					<input type = "hidden" name = "recipeID" value = "', $key,'">
					<input type = "submit" name = "submit" value = "Like" class = "classicColor likeButton">';
					echo '</div>';
				}
				unset($key);
				unset($value);
			?>
		</div>
	</body>
	<footer id = "footer"><?php include 'footer.php'; ?></footer>
</html>