<?php

    // Code to be implemented into pages that require a login

        if(!(isset($_SESSION["StudentID"]))){
            header("Location: index.php");
        }
?>