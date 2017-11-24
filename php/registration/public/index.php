<?php

use Lib\User;

require_once '../vendor/Lib/User.php';

session_start();

if(isset($_SESSION['userId'])){
    if(!headers_sent()){
        header("Location: /private.php");
    }
}

$name = '';
$pass = '';
$message = '';

if(isset($_POST['name']) && isset($_POST['pass'])){

    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);
    $user = User::findByName($name);

    if($user !== null && password_verify($pass, $user->pass)){
        $_SESSION['userId'] = $user->id;
        if(!headers_sent()){
            header("Location: /private.php");
        }
    }
    else{
        $message = 'Неверный логин или пароль!';
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
        <input type="submit" value="Войти">
    </p>
</form>
<p><a href="register.php">Регистрация</a></p>

