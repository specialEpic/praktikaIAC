<?php
session_start();
require_once("mysitedb.php");//подключение к бд
if($_SESSION['login']) // если пользователь авторизован, то выводим его данные в поля для ввода
{
    echo "<a href='logout.php' class='a'>Выйти</a>";
}
else
{
    echo "<a href='index.php' class='a'>Войти</a>"."<br/>";
}
echo "</div>";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Связаться с нами</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <div class='main'>
        <div class="bar">
            <img src="logo.png" alt="logotip" class="logo">
        </div>
        <div class="glav">
            <h1>Вы можете связаться с нами с помощью формы ниже.</h1>



        </div>
    </div>
</body>
</html>
