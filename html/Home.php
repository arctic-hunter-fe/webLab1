<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #374349;">

    <a class="navbar-brand">
        <img src="../icons/icon1.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light" href="../html/UsersTable.php">Users table</a>
            </li>
            <?php
            if(!$_SESSION["name"]==NULL){
                echo " <li class='nav-item'>";
            require "../php/logout.php";
            echo " <a class='nav-link text-light ' href='UsersTable.php?do=logout'>Logout</a></li>";
            }

            ?>


        </ul>
    </div>
</nav>
<div class="m-4 text-center">
    <img src="../img/work.jpg" class="size-5 md-avatar img-thumbnail" alt="img"><br><br>
    <p class="display-3 worktext" >Work in the Mountains</p>
</div>
</body>
</html>