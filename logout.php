<?php
session_start();
$_SESSION = [];
if(session_destroy()) {
    header("Location: index.php");
}
?>