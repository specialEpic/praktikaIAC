<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="main">
    <div class="bar">
        <img src="logo.img" alt="logotip" class="logo">
    </div>
    <div class="glav">
        <h1>Регистрация</h1>
        <form method="post" action="">
            <label>Логин</label><br>
            <input type="text" name="login" required maxlength="25" ><br>
            <label>Пароль</label><br>
            <input type="password" name="password" required maxlength="25"><br>
            <label>ФИО</label><br>
            <input type="text" name="name" required maxlength="100"><br>
            <label>Дата рождения</label><br>
            <input type="date" name="birthday" required><br>
            <label>Введите вашу почту</label><br>
            <input type="text" min="0"  name="email" required maxlength="50"><br>
            <input type="submit" name="submit" value="Зарегистрироваться">
        </form>
    </div>
</div>
</body>
</html>

<?php
require_once("mysitedb.php");
if (isset($_POST['login'], $_POST['password'], $_POST['name'], $_POST['birthday'], $_POST['email'])) //проверка формы на заполнение
{
    $query = "SELECT * FROM users WHERE login='" . $_POST['login'] . "'"; // запрос на существование введенного логина
    $result = pg_query($link, $query);
    if (pg_num_rows($result) >= 1) {        //если передается хотя бы одна строка, то выводим сообщение
        echo "<script> alert(\"Пользователь с таким логином уже существует.\");</script>";
    }
    else
    {
        $login = trim(htmlspecialchars(stripslashes($_POST['login']))); //защита
        $password = trim(htmlspecialchars(stripslashes($_POST['password'])));
        $name = trim(htmlspecialchars(stripslashes($_POST['name'])));
        $data_vid = trim(htmlspecialchars(stripslashes($_POST['birthday'])));
        $num_doc = trim(htmlspecialchars(stripslashes($_POST['email'])));
        $password = md5($password);
        $result_ins = pg_query($link, "INSERT INTO users VALUES 
        (DEFAULT,'$login','$password','$name','$birthday','$email');");
        if ($result_ins)
        {
            echo "Регистрация прошла успешно";
            header('Location:index.php');
        }
        else echo "Ошибка, попробуйте еще раз.";
    }
}
?>