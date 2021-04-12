<?php
    if(!isset($_SESSION)) 
        session_start(); 

    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $blogID = htmlspecialchars($_GET["blogID"]);

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
            // check if it exists
            $sql = "SELECT liked 
                    FROM Likes 
                    WHERE username = '$username' AND blogID = '$blogID'";
            $results = mysqli_query($connection, $sql);

            if(mysqli_num_rows($results) == 0)
                echo "<button class='btn btn-danger' id='like-button'><i class='fas fa-heart'></i>  Like</button>";
            else {
                foreach($results as $row)
                    $liked = $row['liked'];
                
                if($liked)
                    echo "<button class='btn btn-danger' id='like-button' disabled><i class='fas fa-heart'></i>  Like</button>";
                else
                    echo "<button class='btn btn-danger' id='like-button'><i class='fas fa-heart'></i>  Like</button>";
            }
        }

        mysqli_close($connection);
    }
    else
        echo "<h5>Login to like the post!</h5>";
?>