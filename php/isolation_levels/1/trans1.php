<?php

require_once '../include/connectDb.php';

try{
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    $pdo->beginTransaction();

    $stm = $pdo->query("SELECT * FROM users where id = 3");
//    $stm = $pdo->query("SELECT * FROM users where id = 3 LOCK IN SHARE MODE");
//    $stm = $pdo->query("SELECT * FROM users where id = 3 FOR UPDATE");
    $resultBefore = $stm->fetch(\PDO::FETCH_ASSOC);

    $stm = $pdo->prepare("UPDATE users SET age = :age WHERE id = 3");
    $stm->bindValue(":age", $resultBefore['age']+1);
    $stm->execute();

    sleep(5);

    $stm = $pdo->query("SELECT * FROM users where id = 3");
    $resultAfter = $stm->fetch(\PDO::FETCH_ASSOC);


    $pdo->commit();
} catch(\Exception $e){
    die($e->getMessage());
    $pdo->rollback();
}

var_dump($resultBefore);
var_dump($resultAfter);
die();
