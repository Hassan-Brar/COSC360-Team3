<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a047e9d6ce.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/navFooter.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/userpage.css">
    <title>Sports Blog</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <h1 class="navbar-brand">T3 Blogs</h1>

        <!-- TOGGLE BUTTON -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- NAVBAR ELEMENTS -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav ml-auto">
                <a href="mainPage.php"><button class="btn btn-primary" type="button">Home</button></a>
                <?php include 'include/navbarLoggedIn.php';?>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
            </div>
        </div>
    </nav>

    <div class="container" id="user-area">
        <?php
            if(!isset($_SESSION)) 
                session_start(); 
            echo("<h1>" .$_SESSION["username"] ."</h1>");
        ?>

        <hr class="mb-3">

        <div class="row justify-content-md-center">
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
                    if(!isset($_SESSION)) 
                        session_start(); 

                    $username = $_SESSION["username"];

                    $sql = "SELECT * 
                            FROM Users 
                            WHERE username = '$username'";

                    $results = mysqli_query($connection, $sql);

                    if(isset($results)) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '<img class="rounded-circle" id="profile-icon" src="data:image/jpeg;base64,' .base64_encode($row['profileImage']) .'"/>';
                        }
                    }
                    else   
                        echo "Unable to find user!";
                }
            ?>
        </div>

        <hr class="mb-3">

        <div class="container" id="password-update">
            <h2>Update Password</h2>

            <?php
                if (isset($_REQUEST['passwordMatchError'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        Old password does not match!
                    </div>");
                }
                if (isset($_REQUEST['passwordError'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        Unable to set password!
                    </div>");
                }
                if (isset($_REQUEST['passwordUpdate'])) {
                    echo("
                    <div class='alert alert-success' role='alert'>
                        Password updated!
                    </div>");
                }
            ?>

            <form action="updatePassword.php" method="post">
                <div class="form-group row justify-content-center">
                    <label for="username" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="username" name="oldpassword" placeholder="Old Password" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="newpassword" placeholder="New Password" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <input type="submit" class="btn btn-primary justify-content-center" name="submitted" value="Update">
                </div>

            </form>
        </div>

        <hr class="mb-3">

        <div class="container" id="picture-update">
            <h2>Update Profile Picture</h2>

            <?php
                if (isset($_REQUEST['imageError'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        Unable to change image!
                    </div>");
                }
                if (isset($_REQUEST['imageUpdate'])) {
                    echo("
                    <div class='alert alert-success' role='alert'>
                        Image updated!
                    </div>");
                }
            ?>

            <form action="updatePicture.php" method="post" enctype="multipart/form-data">
                <div class="form-group row justify-content-center">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control-file" id="image" name="image" placeholder="Image" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <input type="submit" class="btn btn-primary justify-content-center" name="submitted" value="Update">
                </div>

            </form>
        </div>

        <hr class="mb-3">

    </div>


    <!-- FOOTER -->
    <footer>
        <div class="container-fluid">
            <span href="#" class="brand">T3 Blogs</span>

            <span class="float-right" id="socialMedia">
                <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="http://facebook.com"><i class="fab fa-facebook-square"></i></a>
                <a href="http://twitter.com"><i class="fab fa-twitter-square"></i></a>
            </div>
        </div>
    </footer>

</body>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>