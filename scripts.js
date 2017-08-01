$(function () {

    var $usernameInput = $('input[type=text]');
    var $passwordInput = $('input[type=password]');
    var $form = $('form');
    var $errorList = $('#error-list');
    
    function validatePassword(password) {
        $passwordInput = 'road_to_web_design1';
        var passwordInput = str.length;
        var regex = '/^[\w]+$/i';
        return ['Your password includes forbidden symbols'];
        if(passwordInput < 4);
        return ['Your password should be more than 4 characters long'];
        if(passwordInput > 20);
        return ['Your password should be less than 20 characters long'];
    }

    
    function validateUsername(username, FILTER_VALIDATE_EMAIL) {
        $usernameInput = 'somemail@mail.ru';
        if (!filter_var(usernameInput, FILTER_VALIDATE_EMAIL));
        return ["Your e-mail is invalid"];
    }
    
    function showErrors(errors) {
        for (var i = 0; i < errors.length; i++) {
            var errorText = errors[i];
            var $errorElement = $('<li>').html(errorText);

            $errorList.append($errorElement);
        }
    }

    function clearErrors() {
        $errorList.html("");
    }

    $('form').submit(function () {
        clearErrors();
        var passwordErrors = validatePassword($passwordInput);
        var usernameErrors = validateUsername($usernameInput);
        var errors = Array.prototype.concat(passwordErrors, usernameErrors);

        if (errors.length > 0) {
            showErrors(errors);
            return false;
        }
    })


});