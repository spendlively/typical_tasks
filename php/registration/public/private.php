<?php

use Lib\User;

require_once '../vendor/Lib/User.php';

session_start();

$message = 'Ошибка';
if($user = User::findById($_SESSION['userId'])){
    $message = 'Привет, ' . htmlspecialchars($user->name);
}

?>

<script>

    function exit(){

        var xhr = new XMLHttpRequest();
        xhr.open("GET", '/ajax.php?cmd=exit', true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4) return;
            if(xhr.status === 200){
                if(xhr.statusText === 'OK'){
                    window.location.href = '/';
                }
            }
        };
        xhr.send();

    }

    function del(){

        var xhr = new XMLHttpRequest();
        xhr.open("GET", '/ajax.php?cmd=del', true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4) return;
            if(xhr.status === 200){
                if(xhr.statusText === 'OK'){
                    window.location.href = '/';
                }
            }
        };
        xhr.send();

    }
</script>

<h1><?= $message ?></h1>
<button onclick="exit(); return false;">Выход</button>
<button onclick="del(); return false;">Удалить</button>