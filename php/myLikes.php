<?php
  require 'database.php';
  require 'loginCheck.php';
  session_start();
  echo '<link rel="stylesheet" href="../css/recipeList.css">';
  
  $sql = "SELECT * FROM userrecipelikes WHERE userID= :userID";
  $stmt = $pdo->prepare($sql);
  $stmt-> execute(['userID' => $_SESSION['userID']]);
  $recipeLikes = array();
  $recipeLikes = $stmt->fetchAll(PDO::FetchColumn, 1);
  
  for($i = 0; $i<count($recipeLikes); $i++){
    echo '<div class="card recipe">';
    $recipeJSON = file_get_contents(API_GET_URL."&rId=".$recipeLikes[$i]);
    $recipeData = json_decode($recipeJSON, true);

    echo '<h3>', $recipeData['recipe']['title'], '</h3>';
    echo '<img src = "', $recipeData['recipe']['image_url'],'" alt = "Image: ', $recipeData['recipe']['title'],'" class  = "foodImg">';
    echo '<br><ul>';
    for($j = 0; $j<count($recipeData['recipe']['ingredients']); $j++){
      echo '<li>', $recipeData['recipe']['ingredients'][$j],'</li>';
    }
    echo '</ul>';
    echo '<a href = "', $recipeData['recipe']['source_url'],'" target = "_blank">Read More</a>';
    echo '</div>';
  }
?>