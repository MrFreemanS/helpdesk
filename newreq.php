



<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Создание новой заявки</title>
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
    <li class="nav-item">
      <a class="nav-link" href="/userpage.php">Все заявки</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/newreq.php">Создать новую заявку</a>
    </li>
      <li class="nav-item">
          <a class="nav-link" href="/logout.php">Выйти</a>
      </li>
  </ul>
</nav>

<div class="container">
    <br>
    <h2>Новая заявка</h2>
    <br>

    <form action="/functions/new_req.php" method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Причина обращения</label>
        <input type="text" class="form-control" name="request_title" placeholder="Коротко о причине">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Приоритет</label>
        <select class="form-control" name="request_priority" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Опишите подробно проблему</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="request_txt" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-success">отправить</button>
    </form>
    </div>
</body>
</html>
