<?php

require_once '../include/connectDb.php';

try{
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    $pdo->beginTransaction();

    $stm = $pdo->prepare("UPDATE users SET age = age + 1 WHERE id = 1");
    $result = $stm->execute();

    $pdo->commit();
} catch(\Exception $e){
    die($e->getMessage());
    $pdo->rollback();
}

var_dump($result);
die();
