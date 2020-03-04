<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная страница</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
    <div class="bar">
        <img src="logo.img" alt="logotip" class="logo">
    </div>
    <div class="glav">
        <h1>Для доступа на портал обратной связи пройдите авторизацию</h1>
        <form method="post" action="">
            <label>Логин</label><br>
            <label>
                <input type="text" name="login" required maxlength="25">
            </label><br>
            <label>Пароль</label><br>
            <label>
                <input type="password" name="password" required maxlength="25">
            </label><br>
            <input type="submit" name="submit" value="Войти"><br>
            <a href="register.php" class="button">Еще не зарегистрированы?</a><br>
        </form>
    </div>
</div>
</body>
</html>

<?php
session_start();
require_once("mysitedb.php");
if (isset($_POST['login'], $_POST['password'])) //проверка формы на заполнение
{
    $login=$_POST['login'];     //значения из формы присваиваются к переменным
    $password=$_POST['password'];
    $password=md5($password);   //хеширование пароля
    $query = "SELECT * FROM users WHERE login='$login' AND password='$password';";  //поиск соответствия пользователя
    $result = pg_query($link, $query) or die(pg_last_error($link));

    if(pg_num_rows($result)==1) //если передается одна строка, то присваеваем сессии значение переменной по ключу логин
    {
        $_SESSION['login']=$login;
    }
    else
    {
        echo"<script> alert(\"Неверный логин или пароль.\");</script>";
    }
}
if(isset($_SESSION['login']))
{
    $login=$_SESSION['login'];
    echo "Здравствуйте, $login"."<br>";
    echo "<a href='logout.php'>Выйти</a>";
    header('Location:index2.php');
}
?>