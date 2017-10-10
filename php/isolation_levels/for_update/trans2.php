<?php

require_once '../include/connectDb.php';

try{
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
//    $pdo->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

    $pdo->beginTransaction();

    //SELECT ... FOR UPDATE проверяет есть ли блокировка на запись и ожидает освобождения
    $stm = $pdo->query("SELECT * FROM users where id = 1 FOR UPDATE");
    $result = $stm->fetch(\PDO::FETCH_ASSOC);

    //ВНИМАНИЕ!!!
    //Без FOR UPDATE SELECT не будет дожидаться окончания блокировки и вернет значение
    //1. READ UNCOMMITTED новое значение (даже если оно еще не закоммичено)
    //2. READ COMMITTED, REPEATABLE READ ... - старое значение (если новое еще не закоммичено)
    //Если 2 транзакция захочет тоже обновить - возможен ряд ошибок
//    $stm = $pdo->query("SELECT * FROM users where id = 1");
//    $result = $stm->fetch(\PDO::FETCH_ASSOC);

    $pdo->commit();
} catch(\Exception $e){
    die($e->getMessage());
    $pdo->rollback();
}

var_dump($result);
die();
