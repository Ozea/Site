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

    include ("DbConfig.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $sql = "Select id from users where username = '$username' and password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    $errors = [];
    if($count == 1) {
        $_SESSION['username'] = $username;
        header("location:welcome.php");
        }else {
        $errors[] = "Your E-mail or password is invalid";
            }
            return $errors;

        $EmailErrors = EmailValidation($username);
        $PassErrors = PasswordValidation($password);
        $errors = array_merge($EmailErrors, $PassErrors);
}
?>
<?php
require_once 'DbConfig.php';
$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE)
    or die("Error". mysqli_error($link));

mysqli_close($link);
?>

