<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get the post request data
        $comment = $_POST['post-comment'];
        $blogID = $_POST['blogID'];

        $comment = addslashes($comment);
        
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
            
            if($results) {
                $sql_get_commenter = "SELECT * 
                                      FROM Users 
                                      WHERE username = '$username'";
                $results_commenter = mysqli_query($connection, $sql_get_commenter);

                foreach($results_commenter as $row_commenter) {
                    $commenterFirstName = $row_commenter['firstname'];
                    $commenterLastName = $row_commenter['lastname'];
                    $commenterImage = $row_commenter['profileImage'];
                }

                echo ("<li class='list-group-item'>
                        <div class='container d-flex align-items-center'>
                            <img class='rounded-circle' id='profile-icon' src='data:image/jpeg;base64," .base64_encode($commenterImage) ."'/>
                            <p class='card-text' id='poster-name'>$commenterFirstName $commenterLastName</p>
                        </div>
                        <div class='container'>
                            <p id='comment-text'>$comment</p>
                        </div>
                    </li>");
            }
            mysqli_close($connection);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "Unable to make a GET request!";
        echo "<a href='http://localhost/project/sportsSite/mainPage.php'> Return to main page</a>";
    }
?>