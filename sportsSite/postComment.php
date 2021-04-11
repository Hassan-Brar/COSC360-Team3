<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get the post request data
        $comment = $_POST['post-comment'];
        $blogID = $_POST['blogID'];
        
        // Get username
        if(!isset($_SESSION)) 
            session_start(); 

        $username = $_SESSION['username'];

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
            $sql = "INSERT INTO Comments(blogID, username, commentText) 
                    VALUES('$blogID', '$username', '$comment')";
            $results = mysqli_query($connection, $sql);
            
            mysqli_close($connection);

            // ADD ERROR TESTING HERE
            header("Location: http://localhost/project/sportsSite/blogPage.php?blogID=$blogID");

        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "Unable to make a GET request!";
        echo "<a href='http://localhost/project/sportsSite/mainPage.php'> Return to main page</a>";
    }
?>