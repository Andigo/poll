<?php
$name = $_POST['name'];
$email = $_POST['email'];
$polls = $_POST['polls'];
$host = 'localhost'; // адрес сервера
$database = 'base'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль
$corrects = array("1", "2", "1");
$result = array();

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$db= mysql_select_db("base", $con);
$userdata = "INSERT INTO users(name, email)VALUES($name, $email)";
mysqli_query($link, $userdata) or die("Ошибка " . mysqli_error($link));
$id_query = "SELECT id FROM users WHERE name=$name, email=$email";
$user_id = mysqli_query($link, $id_query) or die("Ошибка " . mysqli_error($link));
$res_query = "INSERT INTO polls(user, result)VALUES($user_id, $polls)";
mysqli_query($link, $res_query) or die("Ошибка " . mysqli_error($link));

foreach($corrects as $key => $correct){
    if($correct == $polls[$key]){
        $result = true;
    }else{
        $result = false;
    }
}

echo $result;
mysqli_close($link);
?>