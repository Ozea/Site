$(function () {

    var $usernameInput = $('input[type=text]');
    var $passwordInput = $('input[type=password]');
    var $form = $('form');
    var $errorList = $('#error-list');
    
    function validatePassword(password) {
        var $errors = [];
        var regex = /^[\w]+$/i;
        var valid = regex.exec(password);
        if(!valid) {
            $errors.push('Your password includes forbidden symbols');
        }
        if(password.length < 4) {
            $errors.push('Your password should be more than 4 characters long');
        }
        if(password.length > 20) {
            $errors.push('Your password should be less than 20 characters long');
        }
        return $errors;
    }

    function validateUsername(username) {
        var $errors = [];
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var valid = re.test(username);
        if(!valid) {
            $errors.push('Your E-mail is invalid');
        }
        return $errors;
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
        var passwordErrors = validatePassword($passwordInput.val());
        var usernameErrors = validateUsername($usernameInput.val());
        var errors = Array.prototype.concat(passwordErrors, usernameErrors);

        if (errors.length > 0) {
            showErrors(errors);
            return false;
        }
    })


});