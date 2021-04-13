<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a047e9d6ce.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/navFooter.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/mainPage.css">
    <link rel="stylesheet" href="CSS/browseBlogs.css">
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
                <?php include 'include/navbarLoggedIn.php';?>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
            </div>
        </div>
    </nav>

    <form>
        <div class="container" id="browse-area">
            <h1>Browse</h1>
            <hr class="mb-3">

            <div class="container">
                <div class="form-group row justify-content-center">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search" required>
                    </div>
                </div>

                </div>

                <div class="form-group row justify-content-center">
                    <input type="submit" class="btn btn-primary justify-content-center" name="searched" value="Search" id="search-btn">
                </div>
            </div>
        </div>
    </form>

    <script>
        $('#search-btn').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "include/searchBlogs.php",
                data: { 'query': $("#search").val() }
            }).done(function(msg) {
                $('#results-section').html(msg);
            });
        });
    </script>

    <div class="container" id="results-area">
        <h1>Results</h1>
        <hr class="mb-3">
        <div class="container" id="results-section">
        </div>
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