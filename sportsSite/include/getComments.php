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
        $blogID = htmlspecialchars($_GET["blogID"]);

        $sql = "SELECT * 
                FROM Comments 
                WHERE blogID = '$blogID'";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) == 0) {
            echo "<h5 id='no-comment'>It looks like this blog has no comments yet. How about you be the first?</h5>";
        }

        foreach($results as $row) {
            $commenter_name = $row['username'];
            $comment = $row['commentText'];

            $sql_get_commenter = "SELECT * 
                                  FROM Users 
                                  WHERE username = '$commenter_name'";
            $results_commenter = mysqli_query($connection, $sql_get_commenter);

            foreach($results_commenter as $row_commenter) {
                $commenterFirstName = $row_commenter['firstname'];
                $commenterLastName = $row_commenter['lastname'];
                $commenterImage = $row_commenter['profileImage'];
            }

            echo "<li class='list-group-item'>
                    <div class='container d-flex align-items-center'>
                        <img class='rounded-circle' id='profile-icon' src='data:image/jpeg;base64," .base64_encode($commenterImage) ."'/>
                        <p class='card-text' id='poster-name'>$commenterFirstName $commenterLastName</p>
                    </div>
                    <div class='container'>
                        <p id='comment-text'>$comment</p>
                    </div>
                  </li>";
        }
        
        mysqli_close($connection);
    }
?>