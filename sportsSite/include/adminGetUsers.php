<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $search_query = $_GET['search_query'];

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
        $sql = "SELECT * 
                FROM Users 
                WHERE username = '$search_query' OR email='$search_query'";
        $results = mysqli_query($connection, $sql);

        if(mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                if($row['isAdmin'] == 0)
                    $admin = 'False';
                else   
                    $admin = 'True';

                if($row['isDisabled'] == 0)
                    $disabled = 'False';
                else   
                    $disabled = 'True';

                echo('
                    <div class="container row">
                        <div class="container col-sm justify-self-center">
                            <img class="rounded-circle" id="profile-icon" src="data:image/jpeg;base64,' .base64_encode($row['profileImage']) .'"/>
                        </div>
                        <div class="container col-sm">
                            <h4>Username: ' .$row['username'] .'</h4>
                            <h4>Email: ' .$row['email'] .'</h4>
                            <h4>First Name: ' .$row['firstname'] .'</h4>
                            <h4>Last Name: ' .$row['lastname'] .'</h4>
                            <h5>Is Admin: ' .$admin .'</h5>
                            <h5>Is Disabled: ' .$disabled .'</h5>
                            <button class="btn btn-danger" id="toggle-disabled" value='. $row['username'].'>Toggle Disable</button>
                        </div>
                    </div>

                    <script>
                        $("#toggle-disabled").click(function(e) {
                            console.log($("#toggle-disabled").val())
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "include/adminToggleDisable.php",
                                data: { "username": $("#toggle-disabled").val() }
                            }).done(function(msg) {
                                $("#user-list").html(msg);
                            });
                        });
                    </script>');
            }
        }
        else {
            echo("<div class='alert alert-danger' role='alert'>
                    Username not found, or password does not match.
                  </div>");
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo("<div class='alert alert-danger' role='alert'>
            Cannot make a POST request.
        </div>");
}
?>
