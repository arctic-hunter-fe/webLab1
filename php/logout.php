<?php
session_start();

if($_GET['do'] == 'logout'){
    session_destroy();
    header("Location: ../html/login.html");
}

?>
