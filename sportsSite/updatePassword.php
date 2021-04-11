<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the post request data
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];

  $oldpassword = md5($oldpassword);


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
    // check if it exists
    $sql = "SELECT pass FROM Users WHERE username = '$username' AND pass = '$oldpassword'";
    $results = mysqli_query($connection, $sql);

    if(mysqli_num_rows($results) == 0) {
      header("Location: http://localhost/project/sportsSite/userpage.php?passwordMatchError=true"); 
      exit(1);
    }

    else {
      $newpassword = md5($newpassword);
      $sql = "UPDATE Users
              SET pass = '$newpassword'
              WHERE username = '$username'";
      
      $results = mysqli_query($connection, $sql);

      if($results) {
        header("Location: http://localhost/project/sportsSite/userpage.php?passwordUpdate=true"); 
        exit(1);
      }
      else
        header("Location: http://localhost/project/sportsSite/userpage.php?passwordError=true"); 
    }

    mysqli_close($connection);
  }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo "Unable to make a GET request!";
  echo "<a href='http://localhost/project/sportsSite/signup.php'> Return to user signup</a>";
}
?>