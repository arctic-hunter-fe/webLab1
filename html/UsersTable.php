
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #374349;">

    <a class="navbar-brand">
        <img src="../icons/icon1.png" width="30" height="30" class="d-inline-block align-top" alt="icon1">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light" href="Home.php">Home</a>
            </li>
            <?php
            session_start();
            if(isset($_SESSION["name"])&&!$_SESSION["name"]==NULL){
                echo " <li class='nav-item'>";
                require "../php/logout.php";
                echo " <a class='nav-link text-light ' href='UsersTable.php?do=logout'>Logout</a></li>";
            }

            ?>


        </ul>
    </div>
</nav>

<div class="container mt-4">
<?php
session_start();
if(!$_SESSION["name"]==NULL){
    echo "<h1><p class='text-right'>Welcome,";
    echo "<a href='../html/MyPage.php'>$_SESSION[name]</a></p></h1>";
}else{
    require "../php/authorizationWr.php";
    echo "<h1><p class='text-right' >";
    echo "<a href='../html/login.html' style='color: #111111; text-decoration: none'>Sign IN</a></p></h1>";
    $_SESSION["role"]=1; //make as a user
    echo "<h2><p class='text-right'>";
    echo "<a href='../html/registration.html' style='color: #111111; text-decoration: none'>Sign UP</a></p></h1>";
}
?>
</div>

<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
//    session_start();
    require "../connect/connectBD.php";
    $sql = "SELECT id, email, first_name, last_name FROM users2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     $role=$_SESSION["role"];

        switch ($role) {
            case 1: //todo user
                while ($row = $result->fetch_assoc()) {
                    $id=$row["id"];
                    echo "<tr><form action='../php/infoabout.php' method='post'>
                    <td>" . $id . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="id" class="btn btn-warning" value='.$id. ';>info</button>' . "</td>
                  </form></tr>";
                }
                break;
            case 2: //todo admin
                while ($row = $result->fetch_assoc()) {
                    $id2=$row["id"];
                    echo "<tr><form action='../php/deleteuser.php' method='post'>
                    <td>" . $id2 . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="id2" class="btn btn-danger" value='.$id2. '>delete</button>' . "</td>
                  </tr>";
                }
                break;

        }

    }
    ?>

    </tbody>
</table>

</body>
</html>