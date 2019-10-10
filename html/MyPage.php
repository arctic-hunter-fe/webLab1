<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyPage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/mypage.css">

</head>
<body>
<form action="../php/upload.php" method="post" enctype="multipart/form-data">
    Select image:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php
session_start();
$email = $_SESSION["email"];
$pass = $_SESSION['pass'];

require "../connect/connectBD.php";
$sql = "SELECT image2 FROM users2 where email='$email' and password='$pass' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<img class='size-5 md-avatar img-thumbnail rounded-circle float-right' alt='Cinque Terre' src='../uploaded/$row[image2]'  />";
?>
</body>
</html>