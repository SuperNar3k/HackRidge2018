<?php
    //Define constants
    define("API_KEY", "4ab8b937d75843765322ce6db7d75659");
    define("API_BASE_URL", "https://food2fork.com/api/");
    define("API_SEARCH_URL", "https://food2fork.com/api/search?key=".API_KEY);
    define("API_GET_URL", "https://food2fork.com/api/get?key=".API_KEY);
    
    $host = "localhost";
    $user = "root";
    $dbname = "hackridge2018";

    $dsn = "mysql:host=".$host."; dbname=".$dbname;

    $pdo = new PDO($dsn,$user);
?>