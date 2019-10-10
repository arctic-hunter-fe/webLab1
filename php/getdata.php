<?php
session_start();
$email = $_SESSION["email"];
$pass = $_SESSION["pass"];

if(isset($_POST['upload'])){
    $imagename=$_FILES["myimage"]["name"];

//Get the content of the image and then add slashes to it
    $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

    require "../connect/connectBD.php";
    $sql = "UPDATE users2 SET image='$imagetmp' WHERE password = '$pass' AND email='$email'";
    $result = $conn->query($sql);
    if($result === true){
        echo "Records was updated successfully.";
    } else{
        echo "ERROR: Could not able to execute. "  . $conn->error;
    }


    $conn->close();
}
?>
