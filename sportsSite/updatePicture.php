<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

  if(!isset($_SESSION)) 
  session_start(); 
    $username = $_SESSION["username"];

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
      $sql = "UPDATE Users
              SET profileImage = '$image'
              WHERE username = '$username'";
      
      $results = mysqli_query($connection, $sql);

      if($results) {
        header("Location: http://localhost/project/sportsSite/userpage.php?imageUpdate=true"); 
        exit(1);
      }
      else
        header("Location: http://localhost/project/sportsSite/userpage.php?imageError=true"); 
    }

    mysqli_close($connection);
  }

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo "Unable to make a GET request!";
  echo "<a href='http://localhost/project/sportsSite/signup.php'> Return to user signup</a>";
}
?>