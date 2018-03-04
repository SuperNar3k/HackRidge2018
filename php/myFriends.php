<?php
    $sql = "SELECT * FROM users WHERE userID=:UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["UserID" => (int)$_GET['userID']]); 
    $rowCount = $stmt->rowCount();
    
    echo 'friends';

?>