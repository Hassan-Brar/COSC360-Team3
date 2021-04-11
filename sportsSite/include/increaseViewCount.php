<?php
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
        if (!isset($_REQUEST['blogID']))
            header("Location: http://localhost/project/sportsSite/blogNotFound.php"); 

        $blogID = htmlspecialchars($_GET["blogID"]);

        $sql = "SELECT views
                FROM Blogs 
                WHERE blogID = '$blogID'";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) == 0)
            header("Location: http://localhost/project/sportsSite/blogNotFound.php"); 
        
        foreach($results as $row)
            $views = $row['views'];
        
        $views++;

        $sql = "UPDATE Blogs
                SET views = '$views'
                WHERE blogID = '$blogID'";
        $results = mysqli_query($connection, $sql);

        mysqli_close($connection);
    }
?>