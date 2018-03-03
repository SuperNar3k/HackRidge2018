<?php

    // Code to be implemented into pages that require a login

        if(!(isset($_SESSION["userID"]))){
            header("Location: index.php");
        }
?>