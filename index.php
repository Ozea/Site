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
<html>
<head>
    <meta charset="utf-8">
    <link rel='stylesheet'  type='text/css' href="bootstrap.min.css" >
    <title>Login form</title>
    <link rel='stylesheet'  type='text/css' href="style.css" >
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script type="text/javascript" src="scripts.js" ></script>
</head>
<body>

<?php if(!$logged): ?> <br>
 <br>
    <?php
   ?>

    <div class="form-wrapper center-block">
        <h1 id="h1id">Login please!</h1>
        <br>
        <ul id="error-list">
            <?php if (!empty($errors)) { ?>
                <?php foreach ($errors as $error1) { ?>
                    <li><?= $error1 ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
        <form method="POST" align="center">
            <b>E-mail</b><br/>
            <input type="text" required min="" name="username" value = "<?php echo empty($username) ? "": $username; ?>" /><br/><br>
            <b>Password</b><br/>
            <input type="password" required name="password"/><br/>
            <div class="checkbox">
            </div><br>
            <div class="form-group">

                <div >
                   <input class="btn btn-default" type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>



<?php else: ?>

    <br><br><h1> You have successfully logged in! </h1>

<?php endif; ?>


</body>

</html>
