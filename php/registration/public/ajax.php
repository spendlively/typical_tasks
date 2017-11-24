<?php

use Lib\User;

require_once '../vendor/Lib/User.php';

session_start();

var_dump("qwerty");die();

if(isset($_GET['cmd'])){

    switch($_GET['cmd']){
        case 'exit':
            exitUser();
            break;
        case 'del':
            break;
        default:
            echo "Error";die();
    }
}

function exitUser()
{
    unset($_SESSION['userId']);
    session_destroy();
    echo "OK";
}

function deleteUser()
{

    if(isset($_SESSION['userId']) && $user = User::findById($_SESSION['userId'])){
        $user->delete();
        exitUser();
    }
}
