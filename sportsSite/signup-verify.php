<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the post request data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

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
    $sql = "SELECT email FROM Users WHERE email = '$email'";
    $results = mysqli_query($connection, $sql);

    if(mysqli_num_rows($results) != 0) {
      header("Location: http://localhost/project/sportsSite/signup.php?error='wrongUorE'"); 
      exit(1);
    }

    $sql = "SELECT username FROM Users WHERE username = '$username'";
    $results = mysqli_query($connection, $sql);

    if(mysqli_num_rows($results) != 0) {
      header("Location: http://localhost/project/sportsSite/signup.php?error='wrongUorE'");
      exit(1);
    }

    else {
      $pass = md5($pass);
      $sql = "INSERT INTO Users(firstname, lastname, username, pass, profileImage, isAdmin) 
              VALUES('$firstname', '$lastname', '$username', '$pass', '$image', FALSE)";
      
      $results = mysqli_query($connection, $sql);

      if($results) {
        header("Location: http://localhost/project/sportsSite/mainPage.html"); 
        exit(1);
      }
      else
        header("Location: http://localhost/project/sportsSite/signup.php"); 
        echo "Unable to add user";
    }

    mysqli_close($connection);
  }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo "Unable to make a GET request!";
  echo "<a href='http://localhost/project/sportsSite/signup.php'> Return to user signup</a>";
}
?>