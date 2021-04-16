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
    <link rel="stylesheet" href="CSS/mainPage.css">
    <link rel="stylesheet" href="CSS/dropdownbtn.css">

    <!-- jquery -->
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <title>Sports Blog</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
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

    <!-- FEATURED ARTICLE -->
    <div class="container-fluid" id="featured-article">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#FArticle">-</button>
            <h1>Featured Article</h1>
        <div id="FArticle" class="collapse show">
            <?php include 'include/getFeaturedArticle.php';?>
        </div>
    </div>

    <script> 
        $(document)ready(function(){
            $("#fltrBtn").click(function(){
                 $(#articles).innerHTML("<?php include 'include/getArticlesByDate.php';?>");
            });
        })
        // $('#filter-btn').click(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "GET",
        //         url: "include/getArticlesByDate.php",
        //         data: { PUT DATA HERE IF YOU NEED TO DO IT }
        //     }).done(function(msg) {
        //         $('#articles').html(msg);
        //     });
        // });
    </script>


    <!-- TOP ARTICLES -->
    <div class="container" style="margin-top: 2rem;">
        <hr class="mb-3">
        <h1>Articles</h1>
        <div class="dropdown">
        <!-- <button id="fltrBtn" class="dropbtn">Filter</button>
            <div class="dropdown-content" id="selectFilter">
                <a href="#articles" option value="date">Filter by date</a>
                <a href="#articles" option value="liked">Filter by most liked</a>
            </div>
        </div> -->
        <button id="fltrBtn">Filter by date</button
    </div>


     <div class="container" id="articles">
        <?php include 'include/getInitialArticles.php';?>
    </div>

    
    <!--<div class="container" id="dated-articles">
        <?php include 'include/getArticlesByDate.php';?>
    </div> -->

    <!-- <div class="container" id="articles"> -->
    

        <!-- // <script>
        //     document.getElementById('selectFilter').onclick = function() {validate()};

        // function validate(){
        //     var check = document.getElementById("selectFilter").selectedIndex;
        //         if (check == 1){
        //             return <?php include 'include/getInitialArticles.php';?>;
        //         }
        //         else{
        //             return <?php include 'include/getArticlesByDate.php';?>;
        //         }
        // }
        // </script>  -->

        

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>