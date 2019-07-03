<?php
	// соединяемся с базой
	$conn = mysqli_connect("localhost", "root", "", "web4");
	// составляем запрос
	$query = "SELECT * FROM users WHERE login='". $_POST['login']."' AND password='".md5($_POST['password'])."';";
	$q = mysqli_query($conn, $query);
	// найден ли кто-нибудь
	$n = mysqli_num_rows($q);
	if ($n!==0)
	{
		// стартуем сессию (можно не в начале файла, т.к. никакого вывода в браузер не было)
		session_start();
		$value=mysqli_fetch_array($q);
		// записываем логин и емейл в сессию
		$_SESSION['login']=$value['login'];
		// редиректим (перенаправляем) на главную страницу сайта
		$_SESSION['message']= 'Вы успешно авторизованы';
		header("Location: index.php");
	}
	else
	{
		header("Location: /login.php"); // если юзер не найден, то снова на страницу авторизации
	}
	mysqli_close();
?>
