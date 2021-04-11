<?php
    session_start();
    $_SESSION["username"] = NULL;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>