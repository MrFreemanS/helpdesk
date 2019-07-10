<?php
session_start();
// соединяемся с базой
require_once "../config.php";

// составляем запрос
$query = "SELECT user_id,user_organization_id FROM users WHERE user_name='". $_SESSION['user_name']."';";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);

$query = "INSERT INTO requests (request_user_id, request_organization_id, request_status, request_priority, request_title, request_txt) 
VALUES ('". $result['user_id']."', '". $result['user_organization_id']."', 'В обработке', '". $_POST['request_priority']."', '". $_POST['request_title']."', '". $_POST['request_txt']."');";

$result = mysqli_real_query($conn, $query);

var_dump($result);

if ($result!=FALSE)
{
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
else
{
    echo "ОШИБКА ОБРАБОТКИ ЗАПРОСА";
}

?>
