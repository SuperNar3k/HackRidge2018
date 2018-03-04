<?php
  require 'database.php';
  session_start();
  require 'loginCheck.php';
  echo '<link rel="stylesheet" href="../css/recipeList.css">';
  
  echo '<script>
      $(document).ready(function(){
        $(".slideUpInit").slideUp(0);
      });

      function toggle(index){
        $("#slideToggledWrapper"+index).slideToggle();
      }
  </script>';

  $sql = "SELECT * FROM userrecipelikes WHERE userID= :userID";
  $stmt = $pdo->prepare($sql);
  $stmt-> execute(['userID' => $_SESSION['userID']]);
  $recipeLikes = array();
  $recipeLikes = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);
  
  for($i = 0; $i<count($recipeLikes); $i++){
    echo '<div class="card recipe">';
    $recipeJSON = file_get_contents(API_GET_URL."&rId=".$recipeLikes[$i]);
    $recipeData = json_decode($recipeJSON, true);

    echo '<h3 style = "cursor: pointer;" onclick = "toggle(', $i,')">', $recipeData['recipe']['title'], '</h3>';
    echo '<div id="slideToggledWrapper', $i,'" class = "slideUpInit">';
    echo '<img src = "', $recipeData['recipe']['image_url'],'" alt = "Image: ', $recipeData['recipe']['title'],'" class  = "foodImg">';
    echo '<br><ul>';
    for($j = 0; $j<count($recipeData['recipe']['ingredients']); $j++){
      echo '<li>', $recipeData['recipe']['ingredients'][$j],'</li>';
    }
    echo '</ul>';
    echo '<a href = "', $recipeData['recipe']['source_url'],'" target = "_blank">Read More</a>';
    echo '</div></div>';
  }
?>