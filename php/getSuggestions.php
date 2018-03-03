<?php
	require 'database.php';
	session_start();//delete kager

	$suggestions = array();

	//Find what current user has liked
	$sql = "SELECT * from userRecipeLikes WHERE userID = :userID";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['userID' => $_SESSION['userID']]);
	$userLikes = $stmt->fetchColumn(1);

	$reviewedUsers = array();
	
	for($i = 0; $i<count($userLikes); $i++){
		//Find other users who have liked the same dishes
		$sql = "SELECT * from userRecipeLikes WHERE recipeID = :recipeID";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['recipeID' => $userLikes[$i]]);
		$similarUsers = $stmt->fetchColumn(0);
		
		for($j = 0; $j<count($similarUsers); $j++){
			//Check if this user has already been reviewed
			if(!in_array($similarUsers[$j], $reviewedUsers, true)){
				$similarityIndex = 0;
				//Find other dishes similar users have liked
				$sql = "SELECT * from userRecipeLikes WHERE userID: userID";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['userID'=>$similarUsers[$j]]);
				$similarUserLikes = $stmt->fetchColumn(1);
				
				//Find out how many recipes are liked in common
				for($k = 0; $k<count($similarUserLikes); $k++){
					if(in_array($similarUserLikes[$k], $userLikes,true)){
						$similarityIndex++;
					}
				}
				//Add to suggestions value for recipes new to user
				for($k = 0; $k<count($similarUserLikes); $k++){
					if(!in_array($similarUserLikes[$k], $userLikes,true)){
						if(isset($suggestions[$similarUserLikes[$k]])){
							$suggestions[$similarUserLikes[$k]]++;
						}
						else{
							$suggestions[$similarUserLikes[$k]] = 1;
						}
					}
				}
				
				$reviewedUsers[] = $similarUsers[$j][0];
			}
		}
	}

	arsort($suggestions);
?>