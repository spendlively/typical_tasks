<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 01.10.17
 * Time: 13:32
 */

require_once __DIR__ . '/../vendor/autoload.php';

//composer dump-autoload

$myPsr0Class = new \PSR0\MyPsr0Class();
$myPsr4Class = new \PSR4\MyPsr4Class();
$justClass = new \ClassMapNamespace\JustClass();
$myClass = new \ClassMapNamespace\MyClass();


var_dump($myPsr0Class->getClassName());
var_dump($myPsr4Class->getClassName());
var_dump($justClass->getClassName());
var_dump($myClass->getClassName());
var_dump(getFileName());
