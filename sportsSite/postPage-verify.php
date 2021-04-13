<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the post request data
  $title = $_POST['title'];
  $text = $_POST['blog-text'];

  $title = addslashes($title);
  $text = addslashes($text);
  
  // Get image
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

  // Get username
  if(!isset($_SESSION)) 
    session_start(); 

  $username = $_SESSION['username'];

  // Create unique ID for the blog post
  include 'include/createUUID.php';
  $uuid = guidv4();

  $date = date("Y-m-d");

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
    $sql = "INSERT INTO Blogs(blogID, blogName, blogText, blogImage, uploadDate, userName, likes, views) 
            VALUES('$uuid', '$title', '$text', '$image', '$date', '$username', 0, 0)";
    $results = mysqli_query($connection, $sql);
    
    mysqli_close($connection);

   if($results) {
    header("Location: http://localhost/project/sportsSite/blogPage.php?blogID=$uuid"); 
    mysqli_close($connection);
    exit(1);
  }
  else
    header("Location: http://localhost/project/sportsSite/postPage.php?uploadError=true"); 
  }

  mysqli_close($connection);
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo "Unable to make a GET request!";
  echo "<a href='http://localhost/project/sportsSite/signup.php'> Return to user signup</a>";
}
?>