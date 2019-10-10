<?php
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

require "../connect/connectBD.php";
session_start();

    $res = mysqli_query($conn, "select * from users2 where email='$email' and password='$pass' ");
    $row = mysqli_fetch_array($res);
    if (is_array($row)) {
        $_SESSION["name"] = $row['first_name'];
        $_SESSION["role"] =  $row['id_role'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["pass"] = $row['password'];
    } else {
        echo "wrong";  //todo make the window
    }

    $conn->close();

header("Location: /tmp/html/UsersTable.php");

?>
