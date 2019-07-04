<?php
session_start();

if($_SESSION['user_name']!=NULL)
{
    require_once 'config.php';
    header("Location: userpage.php"); //
    exit();
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Авторизация</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Авторизация</h2>
  <form action="/functions/autorize.php" method="POST">
    <div class="form-group">
      <label for="login">Имя пользователя:</label>
      <input type="text" class="form-control" id="user_name" placeholder="Введите имя пользователя" name="user_name">
    </div>
    <div class="form-group">
      <label for="password">Пароль:</label>
      <input type="password" class="form-control" id="user_password" placeholder="Введите пароль" name="user_password">
    </div>
    <button type="submit" class="btn btn-success">Войти</button>
  </form>
</div>

</body>
</html>
