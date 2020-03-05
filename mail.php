<?php
$name = $_POST['name'];
$email = $_POST['email'];
$choose = $_POST['choose'];
$topic = $_POST['topic'];
$txt = $_POST['txt'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$choose = htmlspecialchars($choose);
$topic = htmlspecialchars($topic);
$txt = htmlspecialchars($txt);

mail("$email","$topic","");