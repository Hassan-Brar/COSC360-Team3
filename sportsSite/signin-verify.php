<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  // get the post request data
  $username = $_GET['username'];
  $pass = $_GET['password'];
  $pass = md5($pass);

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
    $sql = "SELECT * FROM Users WHERE username = '$username' AND pass = '$pass'";
    $results = mysqli_query($connection, $sql);

    if(mysqli_num_rows($results) != 0) {
        header("Location: http://localhost/project/sportsSite/mainPage.php"); 
        exit(1);
    }
    else {
        header("Location: http://localhost/project/sportsSite/signin.php?error=notFound"); 
        exit(1);
    }

    mysqli_close($connection);
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "Unable to make a POST request!";
  echo "<a href='http://localhost/project/sportsSite/signin.php'> Return to user signin</a>";
}
?>