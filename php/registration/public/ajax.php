<?php

use Lib\User;

require_once '../vendor/Lib/User.php';

session_start();


if(isset($_GET['cmd'])){

    switch($_GET['cmd']){
        case 'exit':
            exitUser();
            break;
        case 'del':
            deleteUser();
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
