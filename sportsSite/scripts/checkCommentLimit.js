var comment = document.getElementById('post-comment');

comment.onkeydown = function(e) {
    if(comment.value.length > 1000) 
        comment.classList.add("is-invalid");
    else
        comment.classList.remove("is-invalid");
}