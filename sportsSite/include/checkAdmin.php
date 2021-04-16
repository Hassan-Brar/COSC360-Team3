<?php
    if(!isset($_SESSION)) 
        session_start(); 
    if(!isset($_SESSION["username"]))
        header("Location: http://localhost/project/sportsSite/mainPage.php");
    else
        $username = ($_SESSION["username"]); 

    // login to the database
    $host = "localhost";
    $database = "project";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);

    // error check
    $error = mysqli_connect_error();

    if($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    }   

    else {
        $sql = "SELECT isAdmin
                FROM Users 
                WHERE username = '$username'";

        $results = mysqli_query($connection, $sql);

        if(isset($results)) {
            while ($row = mysqli_fetch_assoc($results)) {
                if($row['isAdmin'] == 0) {
                    mysqli_close($connection);
                    header("Location: http://localhost/project/sportsSite/mainPage.php");
                } else {
                    mysqli_close($connection);
                }
            }
        }
        else {
            mysqli_close($connection);
            header("Location: http://localhost/project/sportsSite/mainPage.php");
        }
    }
?>