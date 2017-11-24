<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 24.11.17
 * Time: 13:23
 */

namespace Lib;


class Db
{
    public static $pdo = null;

    public static function getPdo()
    {

        if(self::$pdo === null)
        {
            $config = self::getConfig();
            self::$pdo = new \PDO($config['dsn'], $config['username'], $config['passwd']);
        }

        return self::$pdo;
    }

    public static function getConfig()
    {
        $path = realpath(__DIR__ . '/../../config/db.php');
        return require($path);
    }
}
