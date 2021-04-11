<?php
    session_start();
    $_SESSION["username"] = NULL;
    header("Location: http://localhost/project/sportsSite/mainPage.php");
?>