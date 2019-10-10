<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/noBluredLoginStyle.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #374349;">

    <a class="navbar-brand" href="#">
        <img src="../icons/icon1.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light" href="../html/Home.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" >
                <a class="nav-link text-light" href="../html/UsersTable.php">Users Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="MyPage.php">My page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../html/Gallery.html">Maybe gallery</a>
            </li>
            <li class="nav-item">
                <?php
                require "../php/logout.php";
                ?>
                <a class="nav-link text-light " href="UsersTable.php?do=logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
<h1><p class="text-right">Welcome,
        <?php
        session_start();
        echo " " . $_SESSION["name"];
        ?>
    </p></h1>
</div>
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <!--        если админ то действие будет удалить, если не админ то кнопка помотреть профиль-->
    </thead>
    <tbody>

    <?php
    session_start();
    require "../connect/connectBD.php";
    $sql = "SELECT id, email, first_name, last_name FROM users2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     $role=$_SESSION['role'];
        switch ($role) {
            case 1: //todo user
                while ($row = $result->fetch_assoc()) {
                    $id=$row["id"];
                    echo "<tr><form action='../php/infoabout.php' method='post'>
                    <td>" . $id . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="id" class="btn btn-warning" value='.$id.'; onclick=location.href="../php/infoabout.php">info</button>' . "</td>
                  </form></tr>";
                }
                break;
//                onclick=location.href="../php/infoabout.php?do="
            case 2: //todo admin
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["first_name"] . " " . $row["last_name"] . "</td>
                   <td>" . '<button type="submit" name="id" class="btn btn-warning" value='.$id.'; onclick=location.href="../php/deleteuser.php">delete</button>' . "</td>
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