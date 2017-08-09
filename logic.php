<?php
    $logged = false;

    include ("DbConfig.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $sql = "Select id from users where username = '$username' and password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $active = $row['active'];
        $errors = [];
        if ($count == 1) {
            session_start();
            $_SESSION['username'] = $username;
            header("location:welcome.php");
        } else {
            $errors[] = "Your E-mail or password is invalid";
        }
        return $errors;
}

mysqli_close($db);
?>