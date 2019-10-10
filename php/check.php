<?php
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);
//$role = trim($_POST['role']);   не хочет работать

if (mb_strlen($pass) < 6 || mb_strlen($pass) > 20) {
    alert("error in password length!");
    exit();
}

function alert($msg)
{
    echo
    "<script type='text/javascript'>
        alert('$msg');
    </script>";
}

$selectOption = trim($_POST['taskOption']);   //работает спокойно

    require "../connect/connectBD.php";
    $conn->query("INSERT INTO users2 (email, first_name, last_name, password, id_role) VALUES ('$email', '$firstname', '$lastname', '$pass', '$selectOption')");
    $conn->close();

    header("Location: /tmp/html/login.html");


?>
