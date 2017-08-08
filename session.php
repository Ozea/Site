<?php
include ('DbConfig.php');
session_start();
$check_user = $_SESSION('LoginUser');
$ses_sql = mysqli_query($db, "select username from users WHERE username = '$check_user' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['username'];
if(!isset($_SESSION['login_user'])){
    header("location:logic.php");
}
?>