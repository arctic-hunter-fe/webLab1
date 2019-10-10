<?php
$id = $_POST['id2'];
//            echo "id to delete = ". $id;
require "../connect/connectBD.php";
$sql = "DELETE FROM users2 where id='$id' ";
$result = $conn->query($sql);
$conn->close();
header("Location: /tmp/html/UsersTable.php");

?>


