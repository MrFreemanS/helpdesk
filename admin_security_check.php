<?php
	//безопастность на каждой странице подъехала
	session_start();
	// соединяемся с базой

  <?php require_once '/config.php';?>

	// составляем запрос
	$query = "SELECT user_isadmin FROM users WHERE user_name='". $_SESSION['user_name']."';";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);
	if($result['isadmin']!=1)
	{
		header("Location: /login.php"); // если юзер не найден, то снова на страницу авторизации
		exit();
	}
?>
