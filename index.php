<?php
    $logged = false;
    $errors = [];


    /**
     * @param $password
     * @return array
     */
    function validate ($password) {
        $errors = [];
//        var_dump(preg_match('/^[\w]+$/i', $password));
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

    if(isset($_POST['username'])&&isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $errors = validate($password);
        if (empty($errors)) {
            if ($username == 'Somemail@mail.ru' && $password == 'road_to_web_design1') {
                $logged = true;
            } else {
                $error []= "Wrong password and username combination!";
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
        /*.btn{*/
            /*border-radius: 5px;*/
            /*background: rgb(30, 40, 50);*/
            /*color: white;*/
            /*width: 100px;*/
        /*}*/
    </style>

</head>

<body>

<?php if(!$logged): ?> <br>
 <br>
    <?php
//        if(!empty($errors)){
//            var_dump($errors);
//            echo "<p style='color:black'>".$errors."</p>";
//            echo '<ul>';
//            for ($i = 0; $i < count($errors); $i++) {
//                echo "<li style='color:black'>".$errors[$i]."</li>";
//            }
//            $i = 0;
//            while ($i < count($errors)) {
//                echo "<li style='color:black'>".$errors[$i]."</li>";
//                $i++;
//            }
//            foreach ($errors as $error) {
//                echo "<li style='color:black'>".$error."</li>";
//            }
//            echo '</ul>';
//        }
//
//var_dump($errors);
//    ?>
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
            <input type="text" required name="username" /><br/><br>
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
