<?php
session_start();
require_once("mysitedb.php");   //подключение к бд
require_once ("mail.php");
if($_SESSION['login'])
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
            <form method="post" action="mail.php">
                <label>Тип обращения</label><br>
                <select class="choose" required>
                    <option>Вопрос</option>
                    <option>Предложение</option>
                    <option>Отзыв об услуге</option>
                </select><br>
                <label>Тема</label><br>
                <input name="topic" required type="text" maxlength="75" placeholder="Краткое описание обращения"><br>
                <label>Текст обращения</label><br>
                <input name="txt" required type="text" maxlength="1000" placeholder="Писать можно когда угодно, главное - захотеть...">
            </form>
        </div>
    </div>
</body>
</html>

<?php

