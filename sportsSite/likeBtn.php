<?php
    $blogID = htmlspecialchars($_GET["blogID"]);
    if(!isset($_SESSION)) 
        session_start(); 

    $username = $_SESSION['username'];
?>

<script>
    $('#like-button').click(function() {
        $.ajax({
        type: "POST",
        url: "include/likeUpdate.php",
        data: { 'blogID': '<?php echo $blogID?>',
                'username': '<?php echo $username?>' }
        }).done(function( msg ) {
            console.log(msg);
            var like_count = Number($('#likes-count').text());
            console.log(like_count);
            like_count = like_count + 1;
            $('#likes-count').text(like_count);
            $('#like-button').prop('disabled', true);
        });
    });
</script>