<?php
session_start();
if(isset($_SESSION['pid'])) {
    
    session_destroy();
    unset($_SESSION['pid']);
    unset($_SESSION['id']);
    header('Location:login.html');
}
else
{
    echo 'You are not logged in. <a href="login.html">Click here</a> to log in.';
}
    ?>