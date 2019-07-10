<?PHP
session_start();

require_once 'config.php';
require_once 'admin_security_check.php';

//TODO брать это дублируется в проверке на админа

$query = "SELECT user_isadmin FROM users WHERE user_name='". $_SESSION['user_name']."';";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);

if($result['user_isadmin']==NULL)
{
    header("Location:login.php"); // если юзер админ, перекидываем в админку
    exit();
}

if($result['user_isadmin']!=1)
{
    header("Location:userpage.php"); // если юзер админ, перекидываем в админку
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Добавление</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-success navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="/userpage.php">Все заявки</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Создать
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/add.php?type=org">Организацию</a>
                <a class="dropdown-item" href="/add.php?type=user">Пользователя</a>
                <a class="dropdown-item" href="/newreq.php">Заявку</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout.php">Выйти</a>
        </li>
    </ul>
</nav>

<?php
if ( $_GET["type"]== "org")
{
    ?>
<br>
<div class="container">
    <form action="">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
    <?php
}
?>

<?php
if ( $_GET["type"]== "user")
{?>
    <div class="container">
        <br>
        <form action="">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <?php
}?>


</body>
</html>

