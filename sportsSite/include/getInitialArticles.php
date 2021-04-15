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
        $sql = "SELECT * 
                FROM Blogs 
                ORDER BY likes DESC
                LIMIT 6";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) == 0) {
            echo "<h5>Unable to load blogs.</h5>";
            mysqli_close($connection);
            exit(1);
        }
        
        $count = 0;
        foreach($results as $row) {
            $blogID = $row['blogID'];
            $blogName = $row['blogName'];
            $blogText = $row['blogText'];
            $blogImage = $row['blogImage'];
            $uploadDate = $row['uploadDate'];
            $uploadDate = date('Y-m-d', strtotime($uploadDate));
            $likes = $row['likes'];
            $views = $row['views'];
            $uploader = $row['username'];

            $user_sql = "SELECT * 
                        FROM Users 
                        WHERE username = '$uploader'";

            $user_results = mysqli_query($connection, $user_sql);

            foreach($user_results as $user_row) {
                $uploaderFirstName = $user_row['firstname'];
                $uploaderLastName = $user_row['lastname'];
                $uploaderImage = $user_row['profileImage'];
            }

            if(($count % 2 == 0) && ($count > 0))
                echo "</div><div class='row' id='top-articles-row'>";
            else if($count % 2 == 0)
                echo "<div class='row' id='top-articles-row'>";
            
            echo ("
                <div class='col-sm'>
                    <div class='card' id='article-card'>
                    <button type='button' class='btn btn-primary btn-sm' data-toggle='collapse' data-target='#blog$blogID'>-</button>
                    <div id='blog$blogID' class='collapse show'>
                        <img class='card-img-top' src='data:image/jpeg;base64," .base64_encode($blogImage) ."'>
                        <div class='card-body'>
                            <div class='container' id='name-date'>
                                <h3 class='card-title'>$blogName</h3>
                                <p>Posted: $uploadDate</p>
                            </div>
                            <div class='container' id='article-info'>
                                <div class='container d-flex align-items-center'>
                                    <img class='rounded-circle' id='profile-icon' src='data:image/jpeg;base64," .base64_encode($uploaderImage) ."'></img>
                                    <p class='card-text'>$uploaderFirstName $uploaderLastName</p>
                                </div>
                                <div class='container d-flex align-items-center' style='margin-top: 10px;'>
                                    <p><i class='fas fa-heart'></i> $likes</p>
                                    <p>&nbsp&nbsp&nbsp</p>
                                    <p><i class='fas fa-eye'></i> $views</p>
                                </div>
                                <a href='blogPage.php?blogID=$blogID' class='btn btn-primary'>View Article</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            ");
            
            $count = $count + 1;
        }

        echo "</div>";
        
        mysqli_close($connection);
    }
?>