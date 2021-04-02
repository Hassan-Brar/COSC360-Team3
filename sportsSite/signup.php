<?php
    
?>

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
    <link rel="stylesheet" href="navFooter.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="CSS/signup.css">
    <title>Sign up</title>
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
                <button class="btn btn-primary" type="button">Home</button>
                <button class="btn btn-primary" type="button">Sign up</button>
                <button class="btn btn-primary" type="button">Post a blog</button>
            </div>
        </div>
    </nav>

    <!-- Just to add spacing to simulate content in there -->
    <div class="Registration-container">
        <form action="signup.php" method="post">
            <div class="row">
                <div class="col-md-1">
                    <h1>Registration</h1>

                    <label for="firstname"><b>First Name</b></label>
                    <input type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input type="text" name="lastname" required>

                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" required>

                    <input type="submit" name="submitted" value="Sign Up">
                    <hr class="mb-3">
                    <button href="SignIn.php" class="btn btn-primary" id="SignupButton" type="button">Already have an account? Log in</button>
                </div>    
            </div>
        </form>
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