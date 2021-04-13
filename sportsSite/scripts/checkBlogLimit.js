var form = document.getElementById('blog-post-form');
var blogTitle = document.getElementById('title');
var text = document.getElementById('blog-text');

blogTitle.onkeydown = function(e) {
    if(blogTitle.value.length > 50) 
        blogTitle.classList.add("is-invalid");
    else
        blogTitle.classList.remove("is-invalid");
}

text.onkeydown = function(e) {
    if(text.value.length > 8000) 
        text.classList.add("is-invalid");
    else
        text.classList.remove("is-invalid");
}

form.onsubmit = function(e) {
    if(blogTitle.value.length > 50)
        e.preventDefault();
    if(text.value.length > 8000)
        e.preventDefault();
}