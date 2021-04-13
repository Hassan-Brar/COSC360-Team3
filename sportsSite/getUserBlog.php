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
    <link rel="stylesheet" href="CSS/notFound.css">
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
                <a href="browseBlogs.php"><button class="btn btn-primary" type="button">Browse Blogs</button></a>
                <?php include 'include/navbarLoggedIn.php'; ?>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
                <a href="findUserBlog.php"><button class="btn btn-primary" type="button">Admin Controls</button></a>
            </div>
        </div>
    </nav>
    <?php
    $username = $_POST["username"];
    $email = $_POST["email"];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $host = "localhost";
        $database = "project";
        $user = "webuser";
        $password = "P@ssw0rd";

        $connection = mysqli_connect($host, $user, $password, $database);
        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
        } else{
            $sql = $connection->query("SELECT * FROM Users WHERE username = '$username'");
            while ($row = $sql->fetch_assoc()) {
                echo '<img class="rounded-circle" id="profile-icon" src="data:image/jpeg;base64,' .base64_encode($row['profileImage']) .'"/>';
                echo " 
                <table>
                    <tr><td>Username:</td><td>" . $row['username'] . "</td></tr>
                    <tr><td>First Name:</td><td>" . $row['firstname'] . "</td></tr>
                    <tr><td>Last Name: </td><td>" . $row['lastname'] . "</td></tr>
                    <tr><td>Email:</td><td>" . $row['email'] . "</td></tr>
                </table>";
                
                mysqli_free_result($complete);
                mysqli_close($connection);
                die;
            }
            echo "cannot find user";
            mysqli_free_result($complete);
            mysqli_close($connection);
            die;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        die("Unable to get data!");
    }
    ?>

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