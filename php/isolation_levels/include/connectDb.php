<?php

$pdo = new \PDO('mysql:host=localhost;dbname=isolation;charset=utf8', 'isolation', 'isolation');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

//return $pdo;