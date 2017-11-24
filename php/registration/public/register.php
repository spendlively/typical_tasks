<?php

use Lib\User;

require_once '../vendor/Lib/User.php';

$name = '';
$pass = '';
$confirm = '';
$message = '';

if($_POST['name'] && $_POST['pass'] && $_POST['confirm']){

    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);
    $confirm = htmlspecialchars($_POST['confirm']);

    if(
        mb_strlen($name) > User::MAX_LENGTH ||
        mb_strlen($pass) > User::MAX_LENGTH
    ){
        $message = "Длина не может быть больше " . User::MAX_LENGTH;
    }
    elseif($pass !== $confirm){
        $message = "Пароли не совпадают";
    }
    elseif(User::findByName($name) !== null){
        $message = "Пользователь с таким именем уже существует";
    }
    else{
        $user = new User();
        $user->name = $name;
        $user->pass = password_hash($pass,PASSWORD_DEFAULT);;
        if($user->insert()){
            if(!headers_sent()){
                header("Location: /");
            }
        }
    }
}

?>

<h1><?= $message ?></h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <p>
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" value="<?= $name ?>">
    </p>
    <p>
        <label for="pass">Пароль</label>
        <input type="password" name="pass" id="pass" value="<?= $pass ?>">
    </p>
    <p>
        <label for="pass">Подтвердите пароль</label>
        <input type="password" name="confirm" id="confirm" value="">
    </p>
    <p>
        <input type="submit" value="Регистрация">
    </p>
</form>
<p><a href="/">Вход</a></p>

