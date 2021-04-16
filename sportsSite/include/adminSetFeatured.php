<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blogID = $_POST['blogID'];

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
        // Check blog exists
        $sql = "SELECT blogID
                FROM Blogs
                WHERE blogID = '$blogID'";
        $results = mysqli_query($connection, $sql);
        if(mysqli_num_rows($results) > 0) {
            $sql = "TRUNCATE TABLE Featured";
            $results = mysqli_query($connection, $sql);

            $sql = "INSERT INTO Featured (blogID)
                    VALUES ('$blogID')";
            $results = mysqli_query($connection, $sql);

            if($results) {
                echo("<div class='alert alert-success' role='alert'>
                        Featured blog set.
                      </div>");
            }
        }
        else {
            echo("<div class='alert alert-danger' role='alert'>
                    Unable to find corresponding blog.
                  </div>");
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo("<div class='alert alert-danger' role='alert'>
            Cannot make a POST request.
        </div>");
}
?>
