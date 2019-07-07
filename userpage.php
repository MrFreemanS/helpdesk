<?PHP
session_start();

require_once 'config.php';


$query = "SELECT user_isadmin FROM users WHERE user_name='". $_SESSION['user_name']."';";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);

if($result['user_isadmin']==NULL)
{
    header("Location:login.php"); // если юзер админ, перекидываем в админку
    exit();
}

if($result['user_isadmin']==1)
{
    header("Location:adminpage.php"); // если юзер админ, перекидываем в админку
    exit();
}

$query = "SELECT request_id,organization_name,request_status,request_priority,request_data,request_title,request_txt,request_user_id,users.user_name
FROM 
    (SELECT request_id,organization_name,request_status,request_priority,request_data,request_title,request_txt,request_user_id 
    FROM requests 
    INNER JOIN organizations ON requests.request_organization_id=organizations.organization_id) 
    AS tempteble
INNER JOIN users
ON tempteble.request_user_id=users.user_id WHERE users.user_name = '". $_SESSION['user_name']."'";

$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Все заявки организации</title>
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
        <li class="nav-item">
            <a class="nav-link" href="/newreq.php">Создать новую заявку</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout.php">Выйти</a>
        </li>
    </ul>
</nav>

<div class="container">
    <br>
    <h2>Все заявки пользователя <?= $_SESSION['user_name'] ?></h2>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID запроса</th>
            <th>Организация</th>
            <th>Имя пользователя</th>
            <th>Статус</th>
            <th>Приоритет</th>
            <th>Дата</th>
            <th>Краткое описание</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $request):
            ?>
            <tr>
                <td><?=$request['request_id']?></td>
                <td><?=$request['organization_name']?></td>
                <td><?=$request['user_name']?></td>
                <td><?=$request['request_status']?></td>
                <td><?=$request['request_priority']?></td>
                <td><?=$request['request_data']?></td>
                <td><?=$request['request_title']?></td>
            </tr>
        <?PHP endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
