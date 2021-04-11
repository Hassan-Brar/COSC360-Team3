var form = document.getElementById('signup-form');
var pass = document.getElementById('password');
var passCheck = document.getElementById('re-enter-password');
var passwordWarning = document.getElementById('password-warning');

form.onsubmit = function(e) {
    if(pass.value != passCheck.value) {
        passwordWarning.innerHTML = "<div class='alert alert-danger' role='alert'> Passwords don't match!</div>";
        e.preventDefault();
    }
}