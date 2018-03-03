<?php

    $host = "localhost";
    $user = "root";
    $dbname = "nhs_data";

    $dsn = "mysql:host=".$host."; dbname=".$dbname;

    $pdo = new PDO($dsn,$user);

?>