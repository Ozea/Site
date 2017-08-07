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
<?php include 'logic.php' ;?>
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
