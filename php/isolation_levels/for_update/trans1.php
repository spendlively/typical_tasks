<?php

require_once '../include/connectDb.php';

try{
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    $pdo->beginTransaction();

    //Явная блокировка на запись
    $stm = $pdo->query("SELECT * FROM users where id = 1 FOR UPDATE");
    $result = $stm->fetch(\PDO::FETCH_ASSOC);

    //Невная блокировка на запись
    $stm = $pdo->prepare("UPDATE users SET age = age + 1 WHERE id = 1");
    $result = $stm->execute();

    sleep(5);

    $pdo->commit();
} catch(\Exception $e){
    die($e->getMessage());
    $pdo->rollback();
}

var_dump($result);
die();
