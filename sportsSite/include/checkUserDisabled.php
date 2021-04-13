<?php
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
        // check if it exists
        $sql = "SELECT isDisabled 
                FROM Users 
                WHERE username = '$username'";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) != 0) {
            foreach($results as $row) {
                if($row['isDisabled'] == 1) {
                    echo ("
                            </div><div class='container' style='margin-top: 1rem'>
                                <div class='alert alert-danger' role='alert'>
                                    Your account is disabled! You are unable to post or comment.
                                </div>
                           </div>
                           <footer>
                           <div class='container-fluid'>
                               <span href='#' class='brand'>T3 Blogs</span>
                   
                               <span class='float-right' id='socialMedia'>
                                   <a href='http://instagram.com'><i class='fab fa-instagram'></i></a>
                                   <a href='http://facebook.com'><i class='fab fa-facebook-square'></i></a>
                                   <a href='http://twitter.com'><i class='fab fa-twitter-square'></i></a>
                               </div>
                           </div>
                       </footer>");

                    exit(1);
                    mysqli_close($connection);
                }
            }
        }

        mysqli_close($connection);
    }
?>