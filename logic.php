<?php
$logged = false;
$errors = [];
$username = '';
$password = '';

function PasswordValidation ($PassErrors) {
    $errors = [];
    if(!preg_match('/^[\w]+$/i', $PassErrors)) {
        $errors[]= "Password includes forbidden symbols";
    }

    if(strlen($PassErrors) < 4) {
        $errors[]= "Your password should be more than 4 symbols";
    }
    if(strlen($PassErrors) > 20) {
        $errors[]= "Your password should be less than 20 symbols";
    }

    return $errors;
}

function EmailValidation ($EmailErrors) {
    $errors = [];
    if (!filter_var($EmailErrors, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Your email is invalid";
    }
    return $errors;
}

if(isset($_POST['username'])&&isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $EmailErrors = EmailValidation($username);
    $PassErrors = PasswordValidation($password);
    $errors = array_merge($EmailErrors, $PassErrors);
    if (empty($errors)) {
        if ($username == 'somemail@mail.ru' && $password == 'road_to_web_design1') {
            $logged = true;
        } else {
            echo "Wrong password or username combination!";
        }
    }
}

?>

