<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/infoAboutUser.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #374349;">
    <a class="navbar-brand text-light">
        <img src="../icons/icon1.png" width="30" height="30" class="d-inline-block align-top" alt="">
        The Mountain
    </a>
</nav>
<div class="outer">
    <div class="inner">
        <div class="m-4 text-center">
            <?php
            $id = $_POST['id'];
            require "../connect/connectBD.php";
            $sql = "SELECT id, email, first_name, last_name, image2 FROM users2 where id='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "
             <p class='display-3 userInfo'>" . $row["first_name"] . " " . $row["last_name"] . "</p><br>
             <div class='form-row'>
                    <form class=' justify-content-center'>
                        <div class='col '>
                              <img class='size-5 md-avatar img-thumbnail rounded-circle float-right' alt='Cinque Terre' src='../uploaded/$row[image2]'  />
                        </div>
                        <div class=' display-4 userInfo col'>
                               <p >" . $row["email"] . "</p><br>
                        </div>

                    </form>
            </div>

        </div>
    </div>
</div>";
?>


</body>
</html>








