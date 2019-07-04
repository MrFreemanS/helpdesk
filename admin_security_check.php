<?php
	//безопастность на каждой странице подъехала

	// соединяемся с базой


	// составляем запрос
	$query = "SELECT user_isadmin FROM users WHERE user_name='". $_SESSION['user_name']."';";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);
	if($result['user_isadmin']!=1)
	{
		header("Location: /login.php"); // если юзер не найден, то снова на страницу авторизации
		exit();
	}
?>
