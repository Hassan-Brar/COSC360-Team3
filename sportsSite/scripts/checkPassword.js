var form = document.getElementById('signup-form');
var pass = document.getElementById('password');
var passCheck = document.getElementById('re-enter-password');

form.onsubmit = function(e) {
    if(pass.value != passCheck.value) {
        alert("Passwords don't match!");
        e.preventDefault();
    }
}