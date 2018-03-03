<?php
    //Define constants
    define("API_KEY", "29c623e7eb9072ca0d13d2353c2e1a3f");
    define("API_BASE_URL", "https://food2fork.com/api/");
    define("API_SEARCH_URL", "https://food2fork.com/api/search?key=".API_KEY);
    define("API_GET_URL", "https://food2fork.com/api/get?key=".API_KEY);
    
    $host = "localhost";
    $user = "root";
    $dbname = "HackRidge2018";

    $dsn = "mysql:host=".$host."; dbname=".$dbname;

    $pdo = new PDO($dsn,$user);
?>