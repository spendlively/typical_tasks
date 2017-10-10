<?php

require_once '../include/connectDb.php';

try{
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    $pdo->beginTransaction();

    $stm = $pdo->query("SELECT * FROM users where id = 1 LOCK IN SHARE MODE");
    $result = $stm->fetch(\PDO::FETCH_ASSOC);

//    $stm = $pdo->prepare("SELECT * FROM users where id = 1 LOCK IN SHARE MODE");
//    $stm->execute();
//    $result = $stm->fetch(\PDO::FETCH_ASSOC);

    sleep(5);

    $pdo->commit();
} catch(\Exception $e){
    die($e->getMessage());
    $pdo->rollback();
}

var_dump($result);
die();
