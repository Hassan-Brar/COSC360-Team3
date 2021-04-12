<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the post request data
    $username = $_POST['username'];
    $blogID = $_POST['blogID'];

    // login to the database
    $host = "localhost";
    $database = "project";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);

    // UPDATE Blogs SET likes = likes + 1 WHERE blogID = 'nill'

    // error check
    $error = mysqli_connect_error();
    
    if($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    }   

    else {
        // check if it exists
        $sql = "INSERT INTO Likes (liked, username, blogID)
                VALUES (TRUE, '$username', '$blogID')";
        $results = mysqli_query($connection, $sql);


        // check if it exists
        $sql = "UPDATE Blogs
                SET likes = likes + 1
                WHERE blogID = '$blogID'";

        $results = mysqli_query($connection, $sql);
    }

    mysqli_close($connection);
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    exit(1);
}
?>