<?php
    $logged = false;
    $errors = [];
    function validate ($password) {
        $errors = [];
        if(!preg_match('/^[\w]+$/i', $password)) {
            $errors[]= "Password includes forbidden symbols";
        }

        if(strlen($password) < 4) {
            $errors[]= "Your password should be more than 4 symbols";
        }
        if(strlen($password) > 20) {
            $errors[]= "Your password should be less than 20 symbols";
        }

        return $errors;
    }

    function EmailValidation ($username) {
        $errors = [];
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Your email is invalid";
        }
        return $errors;
    }

    if(isset($_POST['username'])&&isset($_POST['password'])) {
        $username = EmailValidation($_POST['username']);
        $username1 = $_POST['username'];
        $password = validate($_POST['password']);
        $password1 = $_POST['password'];
        $errors = array_merge($username, $password);
        if (empty($errors)) {
            if ($username1 == 'Somemail@mail.ru' && $password1 == 'road_to_web_design1') {
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
    <style type="text/css">
        .login h1 { color #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center;  }
        h1 {
            text-align: center;
            color: black;
        }
        body{
            background: #c7b39b url("1.jpg");
            color: #000000;
        }

        .form-wrapper {
           background: rgba(255, 255, 255, 0.5);
            width: 30%;
            padding: 15px;
        }
        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }

    </style>

</head>

<body>

<?php if(!$logged): ?> <br>
 <br>
    <?php
   ?>
    <?php if (!empty($errors)) { ?>
        <ul>
            <?php foreach ($errors as $error1) { ?>
                <li style='color:black'><?= $error1 ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <div class="form-wrapper center-block">
        <h1 >Login please!</h1>
        <br>
        <form method="POST" align="center">

            <b>E-mail</b><br/>
            <input type="text" required name="username" value = <?php echo empty($username1) ? "": $username1; ?> /><br/><br>
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